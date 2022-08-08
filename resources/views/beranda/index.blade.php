@extends('layouts.master')

@section('content')
<h3><b>{{ $title }}</b></h3>

@if(\Auth::user()->role != '3')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                <center>
                    <img style="height:300px;" src="{{ asset('uilogin/img/login1.svg') }}">
                </center>
                <H2>Halo!</H2>
                <h3>Selamat Datang Kembali <i>{{ \Auth::user()->name }}</i></h3>
                <br>
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>{{ \DB::table('jasa')->count() }}</h3>

                                <p>Jenis Barang/Jasa</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ url('jenis-jasa') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{ \DB::table('material')->count() }}</h3>

                                <p>Jenis Material</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="{{ url('jenis-material') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>{{ \DB::table('customer')->count() }}</h3>

                                <p>Jumlah Customer</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="{{ url('customer') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-blue">
                            <div class="inner">
                                <h3>{{ \DB::table('karyawan')->count() }}</h3>

                                <p>Karyawan</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="{{ url('karyawan') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-purple">
                            <div class="inner">
                                <h3>{{ \DB::table('table_transaksi')->count() }}</h3>

                                <p>Transaksi</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="{{ url('transaksi') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                   
                </div>
            </div>
        </div>
    </div>
    @endif




    {{--Untuk selain admin dan pimpinan --}}
    @if(\Auth::user()->role == '3')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-body">
                    <center>
                        <img style="height:300px;" src="{{ asset('uilogin/img/login1.svg') }}">
                    </center>
                    <H2>Halo !</H2>
                    <h3>Selamat Datang Kembali <i>{{ \Auth::user()->name }}</i></h3>
                    <br>
                    <div class="row">
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-red">
                                <div class="inner">
                                    <h3>{{ \DB::table('jasa')->count() }}</h3>
    
                                    <p>Jenis Barang/Jasa</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                {{-- <a href="{{ url('jenis-jasa') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
                            </div>
                        </div>
    
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-yellow">
                                <div class="inner">
                                    <h3>{{ \DB::table('material')->count() }}</h3>
    
                                    <p>Jenis Material</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                {{-- <a href="{{ url('jenis-jasa') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-green">
                                <div class="inner">
                                    <h3>{{ \DB::table('customer')->count() }}</h3>
    
                                    <p>Jumlah Customer</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                {{-- <a href="{{ url('customer') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-blue">
                                <div class="inner">
                                    <h3>{{ \DB::table('karyawan')->count() }}</h3>
    
                                    <p>Karyawan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                {{-- <a href="{{ url('karyawan') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-xs-6">
                            <!-- small box -->
                            <div class="small-box bg-purple">
                                <div class="inner">
                                    <h3>{{ \DB::table('table_transaksi')->count() }}</h3>
    
                                    <p>Transaksi</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                {{-- <a href="{{ url('transaksi') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> --}}
                            </div>
                        </div>
                        <!-- ./col -->
                       
                    </div>
                </div>
            </div>
        </div>
        @endif
    @endsection