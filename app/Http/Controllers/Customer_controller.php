<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use Exception;

class Customer_controller extends Controller
{
    public function index()
    {
        $title = 'Halaman Customer';
        $data = Customer::orderBy('nama', 'asc')->get();

        return view('customer.index', compact('title', 'data'));
    }

    public function add()
    {
        $title = 'Tambah Customer';

        return view('customer.add', compact('title'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
            'unique' => ':attribute customer sudah ada ya silahkan ganti yang lain',
        ];

        $this->validate($request, [
            'email' => 'required|unique:customer',
            'nama' => 'required|unique:customer',
            'no_hp' => 'required|unique:customer',
            'alamat' => 'required|unique:customer'

        ],$messages);

        $data['id'] = \Uuid::generate(4);
        $data['email'] = $request->email;
        $data['nama'] = $request->nama;
        $data['no_hp'] = $request->no_hp;
        $data['alamat'] = $request->alamat;
        $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        Customer::insert($data);

        \Session::flash('sukses', 'Data berhasil ditambahkan');

        return redirect('customer');
    }

    public function edit($id)
    {
        $dt = Customer::find($id);
        $title = "Edit customer $dt->nama";

        return view('customer.edit', compact('title', 'dt'));
    }

    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'email' => 'required',
            'nama' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required'
        ]);
        $data['email'] = $request->email;
        $data['nama'] = $request->nama;
        $data['no_hp'] = $request->no_hp;
        $data['alamat'] = $request->alamat;
        $data['updated_at'] = date('Y-m-d H:i:s');

        Customer::where('id', $id)->update($data);

        \Session::flash('sukses', 'Data berhasil diupdate');

        return redirect('customer');
    }

    public function delete($id)
    {
        try {
            Customer::where('id', $id)->delete();

            \Session::flash('sukses', 'Data berhasil di delete');
        } catch (\Exception $e) {
            \Session::flash('gagal', 'Maaf Data Ini Tidak Dapat Di Hapus Sekarang!');
        }

        return redirect('customer');
    }
}
