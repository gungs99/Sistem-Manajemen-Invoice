@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ url('customer') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                </p>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="box-body">

                <form role="form" method="post" action="{{ url('customer/'.$dt->id) }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email" value="{{ $dt->email }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Nama Customer</label>
                            <input type="text" name="nama" class="form-control" id="exampleInputPassword1" placeholder="Nama Customer" value="{{ $dt->nama }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Nomor Handphone</label>
                            <input type="number" name="no_hp" class="form-control" id="exampleInputPassword1" placeholder="No HP" value="{{ $dt->no_hp }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Alamat</label>
                            <textarea class="form-control" name="alamat" id="" cols="30" rows="5">{{ $dt->alamat }}</textarea>
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