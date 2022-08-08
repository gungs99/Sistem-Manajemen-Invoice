<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nama_perusahaan;

class Profile_controller extends Controller

{
    public function index()
    {
        $title = 'Manage Nama Perusahaan';
        $dt = Nama_perusahaan::first();

        return view('nama_perusahaan.index', compact('title', 'dt'));
    }

    public function update(Request $request)
    {
        try {
            $dt = Nama_perusahaan::first();
            $dt->id = \Uuid::generate(4);
            $dt->nama = $request->nama;
            $dt->alamat = $request->alamat;
            // $dt->no_invoice = $request->no_invoice;
            $dt->nama_web = $request->nama_web;
            $dt->nama_direktur = $request->nama_direktur;
            $dt->no_npwp = $request->no_npwp;
            $dt->kontak = $request->kontak;
            $dt->email_pembayaran = $request->email_pembayaran;
            $dt->nama_cabang = $request->nama_cabang;
            $dt->nama_rek = $request->nama_rek;
            $dt->created_at = date('Y-m-d H:i:s');
            $dt->updated_at = date('Y-m-d H:i:s');
            $dt->No_rek = $request->No_rek;
            $dt->save();

            \Session::flash('sukses', 'Data Berhasil Diubah');
        } catch (\Exception $e) {
            \Session::flash('gagal', $e->getMessage());
        }
        return redirect()->back();
    }
}
