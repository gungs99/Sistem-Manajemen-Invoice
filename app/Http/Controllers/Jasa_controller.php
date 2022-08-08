<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Jasa;

class Jasa_controller extends Controller
{
    public function index()
    {
        $title = 'Jasa';
        $data = Jasa::get();

        return view('jasa.index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Tambah Jasa';

        return view('jasa.add', compact('title'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
            'unique' => ':attribute jasa sudah ada ya silahkan ganti yang lain',
        ];

        $this->validate($request, [
            'nama' => 'required|unique:jasa',
            'harga' => 'required'
        ],$messages);

        $data['id'] = \Uuid::generate(4);
        $data['nama'] = $request->nama;
        $data['harga'] = $request->harga;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        \Session::flash('sukses', 'Data berhasil ditambahkan');

        Jasa::insert($data);

        return redirect('jenis-jasa');
    }

    public function edit($id)
    {
        
        $dt = Jasa::find($id);
        $title = "Edit Jasa $dt->nama";

        return view('jasa.edit', compact('title', 'dt'));
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required'
        ]);

        $data['nama'] = $request->nama;
        $data['harga'] = $request->harga;
        $data['updated_at'] = date('Y-m-d H:i:s');

        Jasa::where('id', $id)->update($data);

        \Session::flash('sukses', 'Data berhasil diubah');

        return redirect('jenis-jasa');
    }

    public function delete($id)
    {
        try {
            Jasa::where('id', $id)->delete();

            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', 'Maaf Data Ini Tidak Dapat Di Hapus Sekarang!');
        }

        return redirect('jenis-jasa');
    }
}
