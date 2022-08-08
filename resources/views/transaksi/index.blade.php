@extends('layouts.master')

@section('content')

<div class="row">  
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <form method="post" action="{{ url('transaksi/draft-invoice') }}">
            {{ csrf_field() }}
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('transaksi/add') }}" class="btn btn-sm btn-flat btn-primary menu-sidebar"><i class="fa fa-plus"></i> Tambah Transaksi </a>
                    <a href="#" class="btn btn-sm btn-flat btn-info btn-filter"><i class="fa fa-search"></i> Cari Tanggal </a>
                    <!-- <a href="{{ url('export-laravel') }}" class="btn btn-sm btn-flat btn-success btn-print"><i class="fa fa-file-excel-o"></i> Cetak Excel</a> -->

                    <button type="submit" class="btn btn-sm btn-flat btn-warning btn-draft"><i class="fa fa-file-pdf-o"></i> Draft Invoice</button>
                </p>
            </div>
            <div class="box-body">

                <div class="row">
                    <div class="col-md-4">
                        
                        <!-- <form method="get" action="{{ url('transaksi/tahun/bulan') }}"> -->
                            {{ csrf_field() }}
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <select class="form-control select2" name="tahun">
                                            <option value="{{ $tahun }}">{{ $tahun }}</option>
                                            @for($i=2000;$i<=2050;$i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </td>

                                    <td>
                                        <select class="form-control select2" name="bulan">
                                            <option value="{{ $bulan }}">{{ $bulan }}</option>
                                            @for($i=1;$i<=12;$i++)
                                            <option value="{{ sprintf('%02d', $i) }}">{{ sprintf("%02d", $i) }}</option>
                                            @endfor
                                        </select>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-md btn-primary btn-tahun">Filter Transaksi</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!-- </form> -->

                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">{{-- myTable2 --}}
                        <thead>
                            <tr>
                                <th>Draft</th>
                                <th>Aksi</th>
                                <th>No</th>
                                <th>No Spk</th>
                                <th>No Invoice</th>
                                <th>Customer</th>
                                <th>Status Pengerjaan</th>
                                <th>Status Pembayaran</th>
                                <th>Grand Total</th>
                                <th>Aksi Status Pengerjaan</th>
                                <th>Aksi Status Pembayaran</th>                                
                                <th>Cetak Invoice</th>
                                <th>Created_at</th>
                                <th>Updated_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $e=>$dt)
                            <tr>
                                <td>
                                    <input type="checkbox" name="draft[]" value="{{ $dt->id }}">
                                </td>
                                <td>
                                    <div style="width:60px">
                                        <a href="{{ route('transaksi.delete',$dt->id) }}" class="btn btn-danger btn-xs btn-hapus" id="delete"><i class="fa fa-trash-o"></i></a>

                                        <a href="{{ route('transaksi.edit',$dt->id) }}" class="btn btn-warning btn-xs btn-edit" id="edit"><i class="fa fa-pencil-square-o"></i></a>

                                        <a href="{{ url('transaksi/detail/'.$dt->id) }}" class="btn btn-success btn-xs btn-edit" id="edit"><i class="fa fa-eye"></i></a>

                                        
                                    </div>
                                </td>
                                <td>{{ $e+1 }}</td>
                                <td>{{ $dt->no_spk }}</td>
                                <td>{{ $dt->no_invoice }}</td>
                                <td>{{ $dt->customers->nama }}</td>
                                <td>{{ $dt->status_pengerjaans->nama }}</td>
                                <td>{{ $dt->status_pembayarans->nama }}</td>
                                <td>Rp. {{ number_format($dt->totals($dt->id),0) }}</td>
                                <td>
                                    <div style="width:60px">
                                    <center><a href="{{ url('transaksi/naikkan-status/'.$dt->id) }}" class="btn btn-success btn-xs btn-edit" id="edit"><i class="fa fa-arrow-up"></i></a></center>
                                        {{-- <a href="{{ url('transaksi/turunkan-status/'.$dt->id) }}" class="btn btn-danger btn-xs btn-edit" id="edit"><i class="fa fa-arrow-down"></i></a> --}}
                                    </div>
                                </td>
                                <td>
                                    <div style="width:60px">
                                        <center><a href="{{ url('transaksi/naikkan-status-pembayaran/'.$dt->id) }}" class="btn btn-success btn-xs btn-edit" id="edit"><i class="fa fa-arrow-up"></i></a></center>
                                        {{-- <a href="{{ url('transaksi/turunkan-status-pembayaran/'.$dt->id) }}" class="btn btn-danger btn-xs btn-edit" id="edit"><i class="fa fa-arrow-down"></i></a> --}}
                                    </div>
                                </td>
                                <td>
                                    <a target="_blank" href="{{ url('transaksi/print/'.$dt->id) }}" class="btn btn-primary btn-xs" id="edit"><i class="fa fa-file-pdf-o"> Pdf</i></a>
                                </td>
                                <td>{{ date('d F y', strtotime($dt->created_at)) }}</td>
                                <td>{{ date('d F y', strtotime($dt->updated_at)) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="8">
                                    <center>
                                        <b><i>Total :</i></b>
                                    </center>
                                </th>
                                <th>
                                    <b><i>Rp. {{ number_format($total,0) }}</i></b>
                                </th>
                                <th colspan="5"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
        </form>
    </div>
</div>

<div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body"> 

                <form role="form" action="{{ url('transaksi/periode') }}" method="get">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Dari Tanggal</label>
                            <input type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Dari Tanggal Berapa ?" name="dari" autocomplete="off" value="{{ date('Y-M-d') }}">
                        </div> 
                        <div class="form-group">
                            <label for="exampleInputPassword1">Sampai Tanggal</label>
                            <input type="text" class="form-control datepicker" id="exampleInputPassword1" placeholder="Sampai Tanggal" name="sampai" autocomplete="off"  value="{{ date('Y-M-d') }}">
                        </div>
                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
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

        var is_pilih = 0;

        $(".btn-draft").click(function(e){
            if(is_pilih == 0){
                e.preventDefault();
                alert('Wajib pilih transaksi terlebih dahulu');
            }
        })

        $("input[type='checkbox']").click(function(e){
            if($(this).is(':checked')){
                 is_pilih += 1;
            }else{
                 is_pilih -= 1;
            }
        });

        $('.myTable2').DataTable({
            dom: 'Bfrtip',
            buttons: [
            'copyHtml5',
            // 'excelHtml5',
            'csvHtml5',
            // 'pdfHtml5'
            ]
          });

        // btn refresh
        $('.btn-refresh').click(function(e) {
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })

        $('.btn-filter').click(function(e) {
            e.preventDefault();
            // alert('asd');
            $('#modal-filter').modal();
        })

        $('.btn-tahun').click(function(e){
            var url = "{{ url('transaksi/tahun/bulan') }}";

            $(this).closest('form').attr('action',url);
            $(this).closest('form').attr('method','get');
        })

    })
</script>

@endsection