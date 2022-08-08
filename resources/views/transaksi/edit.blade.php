@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>

                    <a href="{{ url('transaksi') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                </p>
            </div>
            <div class="box-body">

                <form role="form" method="post" action="{{ url('transaksi/'.$dt->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                    <div class="row">
                        
                        <div class="box-body">

                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">No Spk</label>
                                    <input type="text" class="form-control"  placeholder="cth : 12345/AIT/SPK/I/2020" name="no_spk" value="{{ $dt->no_spk }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">No Invoice</label>
                                    <input type="text" class="form-control"  placeholder="cth : 12345/AIT/INV/I/2020" name="no_invoice" value="{{ $dt->no_invoice }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Customer</label>
                                    <select class="form-control select2" name="customer">
                                        @foreach($customer as $cs)
                                        <option value="{{ $cs->id }}" {{ ($dt->customer == $cs->id) ? 'selected' : '' }}>{{ $cs->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>                                

                                
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status Pengerjaan</label>
                                    <select class="form-control select2" name="status_pengerjaan">
                                        @foreach($status_pengerjaan as $sp)
                                        <option value="{{ $sp->id }}" {{ ($dt->status_pengerjaan == $sp->id) ? 'selected' : '' }}>{{ $sp->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Status Pembayaran</label>
                                    <select class="form-control select2" name="status_pembayaran">
                                        @foreach($status_pembayaran as $spem)
                                        <option value="{{ $spem->id }}" {{ ($dt->status_pembayaran == $spem->id) ? 'selected' : '' }}>{{ $spem->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- /.box-body -->

                        </div>
                    </div>

                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <table class="table">
                                <tbody id="hasil-clone">

                                    @foreach($dt->lines as $ln)
                                    <tr id="list-line">
                                        <td>
                                            <select class="form-control" name="jasa[]">
                                                <option value="{{ $ln->jasas->id }}">{{ $ln->jasas->nama }}</option>
                                                @foreach($jasa as $js)
                                                <option value="{{ $js->id }}">{{ $js->nama }}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td>
                                            <select class="form-control" name="material[]">
                                                <option value="{{ $ln->materials->id }}">{{ $ln->materials->nama }}</option>
                                                @foreach($material as $js)
                                                <option value="{{ $js->id }}">{{ $js->nama }}</option>
                                                @endforeach
                                            </select>
                                        </td>

                                        <td>
                                            <input type="number" name="jumlah[]" class="form-control" placeholder="Jumlah" value="{{ $ln->jumlah }}">
                                        </td>

                                        <td>
                                            <input type="text" name="satuan[]" class="form-control" placeholder="Satuan" value="{{ $ln->satuan }}">
                                        </td>

                                        <td>
                                            <input type="text" name="deskripsi[]" class="form-control" placeholder="Deskripsi" autocomplete="off" value="{{ $ln->deskripsi }}">
                                        </td>

                                        <td>
                                            <p>
                                                <button class="btn btn-xs btn-flat btn-success tbh-line"><i class="fa fa-plus"></i></button>

                                                <a class="btn btn-xs btn-flat btn-danger hapus-line"><i class="fa fa-trash"></i></a>
                                            </p>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div>
                    </div>


                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary menu-sidebar">Update</button>
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

        $('body').on('click',".tbh-line",function(e){
                e.preventDefault();
                $(this).closest('#list-line').clone().appendTo('#hasil-clone');
                // $('#list-line').clone().prependTo('#hasil-clone');
        });

        $('body').on('click',".hapus-line",function(e){
                e.preventDefault();
                $(this).closest('#list-line').remove();
                // $('#list-line').clone().prependTo('#hasil-clone');
        });

        // btn refresh
        $('.btn-refresh').click(function(e) {
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })

    })
</script>

@endsection