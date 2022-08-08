@extends('layouts.master')

@section('content')

<div class="row">  
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{ url('transaksi') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali </a>

                    <a target="_blank" href="{{ url('transaksi/detail/pdf/'.$dt->id) }}" class="btn btn-sm btn-flat btn-success"><i class="fa fa-file-pdf-o"></i> Cetak PDF </a>
                </p>
            </div>
            <div class="box-body">

                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>No Invoice</th>
                                <td>:</td>
                                <td>{{ $dt->no_invoice }}</td>

                                <th>No Spk</th>
                                <td>:</td>
                                <td>{{ $dt->no_spk }}</td>

                                <th>Customer</th>
                                <td>:</td>
                                <td>{{ $dt->customers->nama }}</td>
                            </tr>

                            <tr>
                                <th>Created At</th>
                                <td>:</td>
                                <td>{{ date('d M Y',strtotime($dt->created_at)) }}</td>

                                <th>PPN</th>
                                <td>:</td>
                                <td>{{ number_format($dt->ppn,0) }}</td>

                                <th>Grand Total</th>
                                <td>:</td>
                                <td>{{ number_format($dt->grand_total,0) }}</td>
                            </tr>

                            <tr>
                                <th>Status Pengerjaan</th>
                                <td>:</td>
                                <td>{{ $dt->status_pengerjaans->nama }}</td>

                                <th>Status Pembayaran</th>
                                <td>:</td>
                                <td>{{ $dt->status_pembayarans->nama }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <hr>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Jasa</th>
                                <th>Satuan</th>
                                <th>Harga</th>
                                <th>Jumlah</th>
                                <th>Material</th>
                                <th>Harga Material</th>
                                {{-- <th>PPN</th> --}}
                                <th>Deskripsi</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dt->lines as $e=>$ln)
                            <tr>
                                <td>{{ $e+1 }}</td>
                                <td>{{ $ln->jasas->nama }}</td>
                                <td>{{ $ln->satuan }}</td>
                                <td>Rp. {{ number_format($ln->harga,0) }}</td>
                                <td>{{ $ln->jumlah }}</td>
                                <td>{{ $ln->materials->nama }}</td>
                                <td>Rp. {{ number_format($ln->material_harga,0) }}</td>
                                {{-- <td>{{ number_format($ln->ppn,0) }}</td> --}}
                                <td>{{ $ln->deskripsi }}</td>
                                <td>Rp. {{ number_format($ln->grand_total,0) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

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

        $('.btn-filter').click(function(e) {
            e.preventDefault();
            $('#modal-filter').modal();
        })

    })
</script>

@endsection