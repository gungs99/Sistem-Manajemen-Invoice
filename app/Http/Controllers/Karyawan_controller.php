<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;


class Karyawan_controller extends Controller
{
    public function index(){
    	$title = 'Karyawan';
    	$data = Karyawan::orderBy('nama', 'asc')->get();

    	return view('karyawan.index', compact('title','data'));
    }

    public function add(){
    	$title = 'Tambah Karayawan';

    	return view('karyawan.add', compact('title'));
    }

	 public function store(Request $request)
	 {
		$messages = [
            'required' => ':attribute wajib di isi !!!',
            'unique' => ':attribute karyawan sudah ada ya silahkan ganti yang lain',
        ];
		
    	$this->validate($request, [
			'no_id'=>'required|unique:karyawan',
    		'email'=>'required|unique:karyawan',
			'nama'=>'required|unique:karyawan',
			'no_hp' => 'required|unique:karyawan',
            'alamat' => 'required|unique:karyawan'
		],$messages);
		
		$data['id'] = \Uuid::generate(4);
		$data['no_id'] = $request->no_id;
    	$data['email'] = $request->email;
		$data['nama'] = $request->nama;
		$data['no_hp'] = $request->no_hp;
        $data['alamat'] = $request->alamat;
    	// $data['password'] = bcrypt('almajara123');
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	Karyawan::insert($data);
    	
		\Session::flash('sukses', 'Data berhasil diubah');		

    	return redirect('karyawan');
    }

    public function edit($id){

    	$dt = Karyawan::find($id);
    	$title = "Edit Karyawan $dt->name";

    	return view('karyawan.edit', compact('dt','title'));
    }

    public function update(Request $request, $id){

    	$this->validate($request, [
			'no_id'=>'required',
    		'email'=>'required',
			'nama'=>'required',
			'no_hp' => 'required',
            'alamat' => 'required'
    	]);

    	$data['id'] = \Uuid::generate(4);
		$data['no_id'] = $request->no_id;
    	$data['email'] = $request->email;
		$data['nama'] = $request->nama;
		$data['no_hp'] = $request->no_hp;
        $data['alamat'] = $request->alamat;
    	// $data['password'] = bcrypt('almajara123');
    	// $data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	Karyawan::where('id',$id)->update($data);

    	\Session::flash('sukses', 'Data berhasil diubah');

    	return redirect('karyawan');
    }

    public function delete($id){
    	try {
    		Karyawan::where('id',$id)->delete();

    		\Session::flash('sukses', 'Berhasil menghapus data');
    	} catch (\Exception $e) {
    		\Session::flash('gagal', 'Anda tidak bisa melakukan aksi ini');
    		
    	}

    	return redirect('karyawan');
    }

}
