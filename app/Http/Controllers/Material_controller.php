<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Material;

class Material_controller extends Controller
{
    public function index()
    {
        $title = 'Material';
        $data = Material::get();

        return view('material.index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Tambah Material';

        return view('material.add', compact('title'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
            'unique' => ':attribute material sudah ada ya silahkan ganti yang lain',
        ];

        $this->validate($request, [
            'nama' => 'required|unique:material',
            'harga' => 'required'
        ],$messages);

        $data['id'] = \Uuid::generate(4);
        $data['nama'] = $request->nama;
        $data['harga'] = $request->harga;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        \Session::flash('sukses', 'Data berhasil ditambahkan');

        Material::insert($data);

        return redirect('jenis-material');
    }

    public function edit($id)
    {
        $dt = Material::find($id);
        $title = "Edit Material $dt->nama";

        return view('material.edit', compact('title', 'dt'));
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

        Material::where('id', $id)->update($data);

        \Session::flash('sukses', 'Data berhasil diubah');

        return redirect('jenis-material');
    }

    public function delete($id)
    {
        try {
            Material::where('id', $id)->delete();

            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', 'Maaf Data Ini Tidak Dapat Di Hapus Sekarang!');
        }

        return redirect('jenis-material');
    }
}
