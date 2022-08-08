@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ url('beranda') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                </p>
            </div>
            <div class="box-body">

                <form role="form" action="{{ url('nama_perusahaan') }}" method="post">
                    @csrf
                    {{ method_field('PUT')}}
                    <div class="box-body">
                        <!-- <div class="form-group">
                            <label for="exampleInputEmail1">Logo</label>
                            <input type="image" class="form-control" id="exampleInputEmail1" placeholder="Logo perusahaan" name="logo">
                        </div> -->
                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">No Invoice</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="No Invoice" name="no_invoice" value="{{ $dt->no_invoice }}">
                        </div> --}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Perusahaan</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Perusahaan" name="nama" value="{{ $dt->nama }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Alamat Perusahaan</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Alamat Perusahaan" name="alamat" value="{{ $dt->alamat }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kontak Perusahaan</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Kontak Perusahaan" name="kontak" value="{{ $dt->kontak }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Web Perusahaan</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Web Perusahaan" name="nama_web" value="{{ $dt->nama_web }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Direktur Perusahaan</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Direktur Perusahaan" name="nama_direktur" value="{{ $dt->nama_direktur }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Npwp Perusahaan</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="No Npwp Perusahaan" name="no_npwp" value="{{ $dt->no_npwp }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email Konfirmasi Pembayaran</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email Konfirmasi Pembayaran" name="email_pembayaran" value="{{ $dt->email_pembayaran }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama Rekening</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama Rekening" name="nama_rek" value="{{ $dt->nama_rek }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">No Rekening Perusahaan</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Rekening Perusahaan" name="No_rek" value="{{ $dt->No_rek }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Cabang Rekening Perusahaan</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Cabang Rekening Perusahaan" name="nama_cabang" value="{{ $dt->nama_cabang }}">
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function() {

        // btn refresh
        $('.btn-refresh').click(function(e) {
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })

    })
</script>

@endsection