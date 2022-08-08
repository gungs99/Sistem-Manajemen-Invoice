
@extends('layouts.master')

@section('content')
  <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Edit Avatar</div>

                <div class="panel-body">
                <form class="form-horizontal" method="POST" action="" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="name" class="form-control" name="name" value="{{ old('name') ?? auth()->user()->name }}" required autofocus>

                                {{-- @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ?? auth()->user()->email }}" required autofocus>

                                {{-- @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        {{-- <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="New_Password" class="col-md-4 control-label">Ganti_Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        <div class="form-group{{ $errors->has('avatar') ? ' has-error' : '' }}">
                            <label for="avatar" class="col-md-4 control-label">Avatar</label>
                            <div class="col-md-6">
                                <hr>
                                <center>
                                    <img src="{{ asset(\Auth::user()->avatar) }}" alt="" height="230">
                                    <br>
                                    {{-- <h5 style="color:red;"><b><i>Mengganti Gambar Harus Mengganti Password Juga !!!</i></b></h5> --}}
                                </center>
                                <hr>                           
                                {{-- <input id="avatar" type="file" class="form-control" name="avatar" required> --}}

                                {{-- @if ($errors->has('avatar'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('avatar') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">

                                {{-- @if (auth()->user()->avatar == null )
                                <button type="submit" class="btn  btn-sm btn-flat btn-success">
                                    Save
                                </button>
                                @endif --}}

                                <a href="{{ url('beranda') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>

                                {{-- @if (auth()->user()->avatar != null )
                                    <a href="{{ route('user.delete') }}" class="btn  btn-sm btn-flat btn-danger" 
                                    onclick="event.preventDefault();
                                    document.getElementById('remove-avatar').submit();
                                    ">Hapus</a>
                                @endif                 --}}
                            </div>
                        </div>
                    </form>
                    <form action="{{ route('user.delete') }}" id="remove-avatar" method="POST">
                        @csrf
                        {{ method_field('DELETE') }}

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection