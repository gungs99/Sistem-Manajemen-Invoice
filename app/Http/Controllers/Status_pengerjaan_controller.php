<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Status_pengerjaan;

class Status_pengerjaan_controller extends Controller
{
    public function index()
    {
        $title = 'Status Pengerjaan';
        $data = Status_pengerjaan::orderBy('nama', 'asc')->get();
        $data = Status_pengerjaan::orderBy('urutan', 'asc')->get();

        return view('status_pengerjaan.index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Tambah Status Pengerjaan';

        return view('status_pengerjaan.add', compact('title'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
            'unique' => ':attribute status pengerjaan sudah ada ya silahkan ganti yang lain',
        ];

        $this->validate($request, [
            'nama' => 'required|unique:status_pengerjaan',
            'urutan' => 'required|unique:status_pengerjaan'
        ],$messages);

        $data['id'] = \Uuid::generate(4);
        $data['nama'] = $request->nama;
        $data['urutan'] = $request->urutan;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Status_pengerjaan::insert($data);

        \Session::flash('sukses', 'Data berhasil ditambahkan');

        return redirect('status-pengerjaan');
    }

    public function edit($id)
    {
        $dt = Status_pengerjaan::find($id);

        $title = "Edit Status $dt->nama";

        return view('status_pengerjaan.edit', compact('title', 'dt'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'urutan' => 'required'
        ]);

        // $data['id'] = \Uuid::generate(4);
        $data['nama'] = $request->nama;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');
        $data['urutan'] = $request->urutan;

        Status_pengerjaan::where('id', $id)->update($data);

        \Session::flash('sukses', 'Data berhasil diupdate');

        return redirect('status-pengerjaan');
    }

    public function delete($id)
    {
        try {
            Status_pengerjaan::where('id', $id)->delete();

            \Session::flash('sukses', 'Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal', 'Maaf Data Ini Tidak Dapat Di Hapus Sekarang!');
        }

        return redirect('status-pengerjaan');
    }
}

// $e->getMessage()
