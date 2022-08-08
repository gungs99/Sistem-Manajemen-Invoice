<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('beranda');
});

Route::group(['middleware' => 'auth'], function () {

    Route::get('beranda', 'Beranda_controller@index');

    // Jenis-jasa
    Route::get('jenis-jasa', 'Jasa_controller@index');

    Route::get('jenis-jasa/add', 'Jasa_controller@add');
    Route::post('jenis-jasa/add', 'Jasa_controller@store');

    Route::get('jenis-jasa/{id}', 'Jasa_controller@edit');
    Route::put('jenis-jasa/{id}', 'Jasa_controller@update');

    Route::delete('jenis-jasa/{id}', 'Jasa_controller@delete');

    // Jenis-material
    Route::get('jenis-material', 'Material_controller@index');

    Route::get('jenis-material/add', 'Material_controller@add');
    Route::post('jenis-material/add', 'Material_controller@store');

    Route::get('jenis-material/{id}', 'Material_controller@edit');
    Route::put('jenis-material/{id}', 'Material_controller@update');

    Route::delete('jenis-material/{id}', 'Material_controller@delete');


    // Customer
    Route::get('customer', 'Customer_controller@index');

    Route::get('customer/add', 'Customer_controller@add');
    Route::post('customer/add', 'Customer_controller@store');

    Route::get('customer/{id}', 'Customer_controller@edit');
    Route::put('customer/{id}', 'Customer_controller@update');

    Route::delete('customer/{id}', 'Customer_controller@delete');

    // Status-pengerjaan
    Route::get('status-pengerjaan', 'Status_pengerjaan_controller@index');

    Route::get('status-pengerjaan/add', 'Status_pengerjaan_controller@add');
    Route::post('status-pengerjaan/add', 'Status_pengerjaan_controller@store');

    Route::get('status-pengerjaan/{id}', 'Status_pengerjaan_controller@edit');
    Route::put('status-pengerjaan/{id}', 'Status_pengerjaan_controller@update');

    Route::delete('status-pengerjaan/{id}', 'Status_pengerjaan_controller@delete');

    // Status-pembayaran
    Route::get('status-pembayaran', 'Status_pembayaran_controller@index');

    Route::get('status-pembayaran/add', 'Status_pembayaran_controller@add');
    Route::post('status-pembayaran/add', 'Status_pembayaran_controller@store');

    Route::get('status-pembayaran/{id}', 'Status_pembayaran_controller@edit');
    Route::put('status-pembayaran/{id}', 'Status_pembayaran_controller@update');

    Route::delete('status-pembayaran/{id}', 'Status_pembayaran_controller@delete');

    // Table_transaksi
    Route::get('transaksi', 'Transaksi_controller@index');
    Route::get('transaksi/periode', 'Transaksi_controller@periode');


    Route::get('transaksi/detail/{id}','Transaksi_controller@detail');
    Route::get('transaksi/detail/pdf/{id}','Transaksi_controller@pdf');

    Route::post('transaksi/draft-invoice','Transaksi_controller@draft');
    
    Route::get('transaksi/tahun/bulan','Transaksi_controller@tahun_bulan');

    Route::get('transaksi/add', 'Transaksi_controller@add');
    Route::post('transaksi/add', 'Transaksi_controller@store');

    Route::get('transaksi/{id}', 'Transaksi_controller@edit')->name('transaksi.edit');
    Route::put('transaksi/{id}', 'Transaksi_controller@update');

    Route::delete('transaksi/{id}', 'Transaksi_controller@delete')->name('transaksi.delete');

    Route::get('transaksi/naikkan-status/{id}', 'Transaksi_controller@naikkan_status');
    Route::get('transaksi/turunkan-status/{id}', 'Transaksi_controller@turunkan_status');

    Route::get('transaksi/naikkan-status-pembayaran/{id}', 'Transaksi_controller@naikkan_status_pembayaran');
    Route::get('transaksi/turunkan-status-pembayaran/{id}', 'Transaksi_controller@turunkan_status_pembayaran');

    Route::get('transaksi/print/{id}', 'Transaksi_controller@export');
    Route::get('transaksi/view/{id}', 'Transaksi_controller@view')->name('transaksi.view');

    // Nama Perusahaan
    Route::get('nama_perusahaan', 'Profile_controller@index');
    Route::put('nama_perusahaan', 'Profile_controller@update');

    // Karyawan
    Route::get('karyawan', 'Karyawan_controller@index');

    Route::get('karyawan/add', 'Karyawan_controller@add');
    Route::post('karyawan/add', 'Karyawan_controller@store');

    Route::get('karyawan/{id}', 'Karyawan_controller@edit');
    Route::put('karyawan/{id}', 'Karyawan_controller@update');

    Route::delete('karyawan/{id}', 'Karyawan_controller@delete');

    // Export Excel
    Route::get('export-laravel','ExportLaravelController@export');

    //User Avatar
    Route::get('user-profile', 'UserProfile_controller@edit')->name('user.edit');
    Route::post('user-profile', 'UserProfile_controller@update')->name('user.update');
    Route::delete('user-profile', 'UserProfile_controller@delete')->name('user.delete');

    // Password 
    // Route::get('password','')

});

Auth::routes();

Route::get('/home', function () {
    return redirect('beranda');
});

Route::get('keluar', function () {
    \Auth::logout();
    return redirect('login');
});
