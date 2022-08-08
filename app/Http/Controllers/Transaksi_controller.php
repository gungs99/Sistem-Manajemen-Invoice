<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Jasa;
use App\Models\Material;
use App\Models\Status_pembayaran;
use App\Models\Status_pengerjaan;
use App\Models\Table_transaksi;
use App\Models\Table_transaksi_line;
use App\Models\Nama_perusahaan;
use PDF;
use DB;
use Excel;

use App\Exports\UsersExport;
use App\Exports\TransaksiExport;

class Transaksi_controller extends Controller
{
    public function index()
    {
        $title = 'Halaman Transaksi';
        $data = Table_transaksi::orderBy('created_at', 'asc')->get();
        $total = Table_transaksi::sum('grand_total');
        $tahun = date('Y');
        $bulan = date('m');

        return view('transaksi.index', compact('title', 'data','total','tahun','bulan'));
    }

    public function draft(Request $request){
        try {
            $draft = $request->draft;
            $data = Table_transaksi::withCount('lines')->whereIn('id',$draft)->get();

            return Excel::download(new TransaksiExport($data), 'invoices.xlsx');

        } catch (Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
        return redirect()->back();
    }

    public function detail($id){
        $title = 'Detail Transaksi';
        $dt = Table_transaksi::with('lines')->find($id);

        return view('transaksi.detail',compact('title','dt'));
    }

    public function pdf($id){
        try {
            $dt = Table_transaksi::with('lines')->find($id);
            $nama_perusahaan = Nama_perusahaan::first();
 
            $pdf = PDF::loadview('transaksi.pdf_detail',compact('dt','nama_perusahaan'))->setPaper('a4');
            return $pdf->stream();
 
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage().' ! '.$e->getLine());
        }
 
        return redirect()->back();
    }

    public function periode(Request $request){
        try { 
            $dari = $request->dari;
            $sampai = $request->sampai;

            $title = "Transaksi dari $dari sampai $sampai";

            $data = Table_transaksi::whereDate('created_at', '>=', $dari)->whereDate('created_at', '<=', $sampai)->orderBy('created_at','asc')->get();

            $total = Table_transaksi::whereDate('created_at', '>=', $dari)->whereDate('created_at', '<=', $sampai)->sum('grand_total');
        $tahun = date('Y');
        $bulan = date('m');

            return view('transaksi.index', compact('title', 'data', 'dari', 'sampai','total','tahun','bulan'));
        } catch(\Exeption $e){
            \Session::flash('gagal', 'Anda Tidak Dapat Melakukan Aksi');

            return redirect()->back();
        }

    }

    public function tahun_bulan(Request $request){
        $tahun = $request->tahun;
        $bulan = $request->bulan;
        $title = "Transaksi Tahun $tahun Bulan $bulan";
        $data = Table_transaksi::whereYear('created_at',$tahun)->whereMonth('created_at',$bulan)->orderBy('created_at','asc')->get();

        $total = Table_transaksi::whereYear('created_at',$tahun)->whereMonth('created_at',$bulan)->orderBy('created_at','asc')->sum('grand_total');

        return view('transaksi.index', compact('title', 'data','total','tahun','bulan'));
    }

    public function export($id)
    {
        try {
            $dt = Table_transaksi::find($id);
            $nama_perusahaan = Nama_perusahaan::first();
            $pdf = PDF::loadView('transaksi.pdf', ['dt' => $dt, 'nama_perusahaan' => $nama_perusahaan])->setPaper('a4');
            return $pdf->stream('transaksi.pdf');
        } catch (\Exception $e) {
            \Session::flash('gagal', 'Anda Tidak Dapat Melakukan Aksi');
            return redirect()->back();
        }
    }

    public function view($id)
    {
        $dt = Table_transaksi::find($id);
        $nama_perusahaan = Nama_perusahaan::first();
    
        return view('transaksi.pdf', compact('dt','nama_perusahaan'));
    }

    public function naikkan_status($id) 
    {
        try {
            $transaksi = Table_transaksi::find($id);
            $id_status = $transaksi->status_pengerjaan;
            $urutan_status = $transaksi->status_pengerjaans->urutan;

            $urutan_baru = $urutan_status + 1;
            $status_baru = Status_pengerjaan::where('urutan', $urutan_baru)->first();

            Table_transaksi::where('id', $id)->update([
                'status_pengerjaan' => $status_baru->id
            ]);

            \Session::flash('sukses', 'Status Pengerjaan Berhasil dinaikkan');
        } catch (\Exception $e) {

            \Session::flash('gagal', 'Status Pengerjaan Sudah Selesai');
        }

        return redirect()->back();
    }

    public function turunkan_status($id)
    {
        try {
            $transaksi = Table_transaksi::find($id);
            $id_status = $transaksi->status_pengerjaan;
            $urutan_status = $transaksi->status_pengerjaans->urutan;

            $urutan_baru = $urutan_status - 1;
            $status_baru = Status_pengerjaan::where('urutan', $urutan_baru)->first();

            Table_transaksi::where('id', $id)->update([
                'status_pengerjaan' => $status_baru->id
            ]);

            \Session::flash('sukses', 'Status pengerjaan Berhasil diturunkan');
        } catch (\Exception $e) {

            \Session::flash('gagal', 'Tidak Dapat Menurunkan Status Pengerjaan Lagi !!! ');
        }

        return redirect()->back();
    }


    public function naikkan_status_pembayaran($id)
    {
        try {
            $transaksi = Table_transaksi::find($id);
            $id_status = $transaksi->status_pembayaran;
            $urutan_status = $transaksi->status_pembayarans->urutan;

            $urutan_baru = $urutan_status + 1;
            $status_baru = Status_pembayaran::where('urutan', $urutan_baru)->first();

            Table_transaksi::where('id', $id)->update([
                'status_pembayaran' => $status_baru->id
            ]);

            \Session::flash('sukses', 'Status Pembayaran Berhasil dinaikkan');
        } catch (\Exception $e) {

            \Session::flash('gagal', 'Status Pembayaran Sudah Selesai');
        }

        return redirect()->back();
    }

    public function turunkan_status_pembayaran($id)
    {
        try {
            $transaksi = Table_transaksi::find($id);
            $id_status = $transaksi->status_pembayaran;
            $urutan_status = $transaksi->status_pembayarans->urutan;

            $urutan_baru = $urutan_status - 1;
            $status_baru = Status_pembayaran::where('urutan', $urutan_baru)->first();

            Table_transaksi::where('id', $id)->update([
                'status_pembayaran' => $status_baru->id
            ]);

            \Session::flash('sukses', 'Status Pembayaran Berhasil Turunkan');
        } catch (\Exception $e) {

            \Session::flash('gagal', 'Status Pembayaran Sudah Selesai');
        }

        return redirect()->back();
    }



    public function add()
    {
        $title = 'Tambah Transaksi';
        $deskripsi = Table_transaksi::orderBy('deskripsi', 'asc');
        // $satuan = Table_transaksi::orderBy('satuan', 'asc'); kalau pakai field yg ada pada db ini tdk usah panggil modelnya kecuali panggil relasi dari tbl lain
        $no_spk = Table_transaksi::orderBy('no_spk', 'asc');
        $no_invoice = Table_transaksi::orderBy('no_invoice', 'asc');
        $customer = Customer::orderBy('nama', 'asc')->get();
        $jasa = Jasa::orderBy('nama', 'asc')->get();
        $material = Material::orderBy('nama', 'asc')->get();
        $status_pengerjaan = Status_pengerjaan::orderBy('urutan', 'asc')->get();
        $status_pembayaran = Status_pembayaran::orderBy('nama', 'asc')->get();


        return view('transaksi.add', compact('title', 'customer', 'jasa', 'material','status_pengerjaan', 'status_pembayaran'));
    }

    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib di isi !!!',
            'unique' => ':attribute jasa sudah ada ya silahkan ganti yang lain',
        ];

        try{

            $this->validate($request, [
                'deskripsi' =>'required',
                'no_spk' => 'required',
                'no_invoice' =>'required|unique:table_transaksi',
                'customer' => 'required',
                // 'jasa' => 'required',
                // 'material' => 'required',
                // 'jumlah' => 'required',
                // 'satuan' => 'required',
                'status_pengerjaan' => 'required',
                'status_pembayaran' => 'required'
    
            ],$messages);

            // dd($request->jumlah);
            $header = \Uuid::generate(4);
    
            $data['id'] = $header;
            // $data['deskripsi'] = $request->deskripsi;
            $data['no_spk'] = $request->no_spk;
            $data['no_invoice'] = $request->no_invoice;
            $data['customer'] = $request->customer;
            $data['status_pengerjaan'] = $request->status_pengerjaan;
            $data['status_pembayaran'] = $request->status_pembayaran;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s'); 
    
    
            // data lines
            $jasa = $request->jasa;
            $material = $request->material;
            $jumlah = $request->jumlah;
            $satuan = $request->satuan;
            $deskripsi = $request->deskripsi;

            $tot_grand_total = 0;
            $lines = [];
            foreach ($jasa as $e=>$js) {
                $line['id'] = \Uuid::generate(4);
                $line['header'] = $header;
                $line['jasa'] = $js;
                $line['created_at'] = date('Y-m-d H:i:s');
                $line['updated_at'] = date('Y-m-d H:i:s');
                $line['jumlah'] = $jumlah[$e];

                $dt_jasa = Jasa::find($js);
                $line['harga'] = $dt_jasa->harga;

                $line['satuan'] = $satuan[$e];
                $grand_total_line = $line['harga'] * $line['jumlah'];
                $line['deskripsi'] = $deskripsi[$e];
                $line['material'] = $material[$e];

                $dt_material = Material::find($material[$e]);
                $line['material_harga'] = $dt_material->harga;
    
                // $jumlah_ppn = 0.1;
                // $ppn = $grand_total_line * $jumlah_ppn;
                // $line['ppn'] = $ppn;

                $line['grand_total'] = $grand_total_line + $line['material_harga'];

                $tot_grand_total += $line['grand_total'];

                array_push($lines, $line);
            }

            $jumlah_ppn = 0.1;
            $ppn = $tot_grand_total * $jumlah_ppn;
            $data['ppn'] = $ppn;

            $data['grand_total'] = $tot_grand_total + $data['ppn'];
    
            \DB::transaction(function()use($data,$lines){
                Table_transaksi::insert($data);
                Table_transaksi_line::insert($lines);
            });
        \Session::flash('sukses', 'Data berhasil ditambahkan');

        return redirect('transaksi');

        }catch (\Exception $e){
        \Session::flash('gagal', 'Upss.. data yang anda masukan duplikat atau belum di isi!');

        return redirect('transaksi/add');
        }
    }

    public function edit($id)
    {
        $dt = Table_transaksi::find($id);
        $title = "Edit Transaksi";
        $deskripsi = Table_transaksi::orderBy('deskripsi', 'asc');
        $no_spk = Table_transaksi::orderBy('no_spk', 'asc');
        $no_invoice = Table_transaksi::orderBy('no_invoice', 'asc');
        $customer = Customer::orderBy('nama', 'asc')->get();
        $jasa = Jasa::orderBy('nama', 'asc')->get();
        $material = Material::orderBy('nama', 'asc')->get();
        $status_pengerjaan = Status_pengerjaan::orderBy('urutan', 'asc')->get();
        $status_pembayaran = Status_pembayaran::orderBy('nama', 'asc')->get();


        return view('transaksi.edit', compact('title', 'customer', 'jasa', 'material','status_pengerjaan', 'status_pembayaran', 'dt'));
    }

    public function update(Request $request, $id)
    {
        try{

            $this->validate($request, [
                'deskripsi' =>'required',
                'no_spk' => 'required',
                'no_invoice' =>'required',
                'customer' => 'required',
                // 'jasa' => 'required',
                // 'material' => 'required',
                // 'jumlah' => 'required',
                // 'satuan' => 'required',
                'status_pengerjaan' => 'required',
                'status_pembayaran' => 'required'
    
            ]);

            // dd($request->jumlah);
            $header = $id;
    
            // $data['id'] = $header;
            // $data['deskripsi'] = $request->deskripsi;
            $data['no_spk'] = $request->no_spk;
            $data['no_invoice'] = $request->no_invoice;
            $data['customer'] = $request->customer;
            $data['status_pengerjaan'] = $request->status_pengerjaan;
            $data['status_pembayaran'] = $request->status_pembayaran;
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s'); 
    
    
            // data lines
            $jasa = $request->jasa;
            $material = $request->material;
            $jumlah = $request->jumlah;
            $satuan = $request->satuan;
            $deskripsi = $request->deskripsi;

            $tot_grand_total = 0;
            $lines = [];
            foreach ($jasa as $e=>$js) {
                $line['id'] = \Uuid::generate(4);
                $line['header'] = $header;
                $line['jasa'] = $js;
                $line['created_at'] = date('Y-m-d H:i:s');
                $line['updated_at'] = date('Y-m-d H:i:s');
                $line['jumlah'] = $jumlah[$e];

                $dt_jasa = Jasa::find($js);
                $line['harga'] = $dt_jasa->harga;

                $line['satuan'] = $satuan[$e];
                $grand_total_line = $line['harga'] * $line['jumlah'];
                $line['deskripsi'] = $deskripsi[$e];
                $line['material'] = $material[$e];

                $dt_material = Material::find($material[$e]);
                $line['material_harga'] = $dt_material->harga;
    
                // $jumlah_ppn = 0.1;
                // $ppn = $grand_total_line * $jumlah_ppn;
                // $line['ppn'] = $ppn;

                $line['grand_total'] = $grand_total_line + $line['material_harga'];

                $tot_grand_total += $line['grand_total'];

                array_push($lines, $line);
            }

            $jumlah_ppn = 0.1;
            $ppn = $tot_grand_total * $jumlah_ppn;
            $data['ppn'] = $ppn;

            $data['grand_total'] = $tot_grand_total + $data['ppn'];
    
            \DB::transaction(function()use($data,$lines,$header){
                Table_transaksi::where('id',$header)->update($data);

                Table_transaksi_line::where('header',$header)->delete();
                Table_transaksi_line::insert($lines);
            });
        \Session::flash('sukses', 'Data berhasil diupdate');

        return redirect('transaksi');
        }catch (\Exception $e){
        \Session::flash('gagal', $e->getMessage());

        return redirect('transaksi/add');
        }
    }

    public function delete($id)
    {
        Table_transaksi::where('id', $id)->delete();

        \Session::flash('sukses', 'Transaksi Berhasil dihapus');

        return redirect('transaksi');
    }

}
