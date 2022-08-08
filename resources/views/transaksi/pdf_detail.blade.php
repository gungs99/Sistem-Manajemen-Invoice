<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <title>Document</title>
    <style>
            
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
        }

        .header {
            overflow: hidden;
            padding: 20px 10px;
        }

        .header a {
            float: left;
            color: black;
            text-align: center;
            padding: 12px;
            text-decoration: none;
            font-size: 18px;
            line-height: 25px;
            border-radius: 4px;
        }

        .header a.logo {
            font-size: 25px;
            font-weight: bold;
        }

        .header a:hover {
            background-color: #ddd;
            color: black;
        }

        .header a.active {
            background-color: dodgerblue;
            color: white;
        }

        .header-right {
            float: right;
            ;
        }

        @media screen and (max-width: 500px) {
            .header a {
                float: none;
                display: block;
                text-align: left;
            }

            .header-right {
                float: none;
            }
            
        }

        #watermark{
            margin: auto;
            top : 299px;
            display:block;
            position : absolute;
            opacity: 0.08;
            filter: alpha(opacity=80); 
        }

        .wtrmrk{
            width: 700px;
            height: 500px;
        }
    </style>
</head>

<body>
    
    <div id="watermark">    
        <center><img class="wtrmrk" src="{{ asset('alma1.png') }}"></center>
    </div>

    <!-- Fungsi Terbilang -->
    <?php

    function penyebut($nilai)
    {
        $nilai = abs($nilai);
        $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
        $temp = "";
        if ($nilai < 12) {
            $temp = " " . $huruf[$nilai];
        } else if ($nilai < 20) {
            $temp = penyebut($nilai - 10) . " Belas";
        } else if ($nilai < 100) {
            $temp = penyebut($nilai / 10) . " Puluh" . penyebut($nilai % 10);
        } else if ($nilai < 200) {
            $temp = " Seratus" . penyebut($nilai - 100);
        } else if ($nilai < 1000) {
            $temp = penyebut($nilai / 100) . " Ratus" . penyebut($nilai % 100);
        } else if ($nilai < 2000) {
            $temp = " Seribu" . penyebut($nilai - 1000);
        } else if ($nilai < 1000000) {
            $temp = penyebut($nilai / 1000) . " Ribu" . penyebut($nilai % 1000);
        } else if ($nilai < 1000000000) {
            $temp = penyebut($nilai / 1000000) . " Juta" . penyebut($nilai % 1000000);
        } else if ($nilai < 1000000000000) {
            $temp = penyebut($nilai / 1000000000) . " Milyar" . penyebut(fmod($nilai, 1000000000));
        } else if ($nilai < 1000000000000000) {
            $temp = penyebut($nilai / 1000000000000) . " Trilyun" . penyebut(fmod($nilai, 1000000000000));
        }
        return $temp;
    }

    function terbilang($nilai)
    {
        if ($nilai < 0) {
            $hasil = "minus " . trim(penyebut($nilai));
        } else {
            $hasil = trim(penyebut($nilai));
        }
        return $hasil;
    }

    $angka = $dt->grand_total + $dt->ppn;
    ?>

 

    <div class="header">
        <img style="height: 100px; width:150px;" src="{{asset('alma1.png')}}" alt="">
        <div class="header-right">
            <h3><b>INVOICE</b></h3>
            <p><i> {{ $dt->no_invoice }} </i><br>
               <i> Tanggal : {{ date('d F yy', strtotime($dt->created_at)) }} </i><br>
               <i> Jatuh Tempo : {{ date('d F yy', strtotime('+14 days', strtotime($dt->created_at))) }} </i></p>                     
        </div>
        <hr>
        <div class="row">
            <div class="col-sm">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $nama_perusahaan->nama }}</h5>

                        <p style="font-size: 10pt; text-align: left;" class="card-text">
                            {{ $nama_perusahaan->alamat }} <br>
                            {{ $nama_perusahaan->kontak }} <br>
                            {{ $nama_perusahaan->nama_web }} <br>
                            {{ $nama_perusahaan->no_npwp }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm">
                <div class="card" style="width: 18rem; float:right;">
                    <div class="card-body">
                        <h5 class="card-title">Kepada Yth : <br> {{ $dt->customers->nama }}</h5>
                        <p style="font-size: 10pt; text-align: left;" class="card-text"> {{ $dt->customers->alamat }} <br> Telepon : {{ $dt->customers->no_hp }}</p>
                        <p><i>No SPK : {{ $dt->no_spk }} </i><br>
                    </div>
                </div>
            </div>
        </div>
        <!-- <hr>
        <p style="font-size: 10pt;"><b>Status Pembayaran</b> : {{ $dt->status_pembayarans->nama }}</p> -->
    </div>
    
    <table style="font-size: 10pt;" class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Satuan</th>
                <th>Harga Jasa</th>
                <th>Harga Material</th>
                <th>Total Harga</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $tot_jasa = 0;
                $tot_material = 0;
                $tot_harga = 0;
                $tot_ppn = 0;
            ?>
            @foreach($dt->lines as $e=>$ln)
            <tr>
                <td>{{ $e+1 }}</td>
                <td>{{ $ln->deskripsi }}</td>
                <td>{{ $ln->jumlah }}</td>
                <td>{{ $ln->satuan }}</td>
                <td>Rp. {{ number_format($ln->harga,0) }}</td>
                <td>Rp. {{ number_format($ln->material_harga,0) }}</td>
                <td>Rp. {{ number_format($ln->harga + $ln->material_harga,0) }}</td>
                <?php
                    $tot_harga += ($ln->harga + $ln->material_harga);
                ?>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th colspan="1"><b><i>Subtotal :</i></b></th>
                
                <td> Rp. {{ number_format($tot_harga,0) }}</td>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th colspan="1"><b><i>Ppn 10% :</i></b></th>
                
                <td> Rp. {{ number_format($dt->ppn,0) }}</td>
            </tr>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th colspan="1"><b><i>Grandtotal :</i></b></th>
                
                <td> Rp. {{ number_format($dt->grand_total) }}</td>
            </tr>
        </tfoot>
        <tfoot>
            <tr>
                {{-- <th></th>
                <th></th>
                <th></th> --}}
                <th></th>
                <th colspan="2"><b><i>Terbilang : </i></b></th>
                <td colspan="4"><i style="font-size: 10pt;">## {{ terbilang($dt->grand_total) }} Rupiah ##</i></td>
            </tr>
        </tfoot>
    </table>

    <div class="row">
        <div class="col-sm">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h6 class="card-title">Hormat Kami</h6>
                    <p style="font-size: 10pt; text-align: left;" class="card-text">
                        {{ $nama_perusahaan->nama }} <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <strong><u>{{ $nama_perusahaan->nama_direktur }}</u></strong>
                        <p style="font-size:10pt;">Direktur Utama</p>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-sm">
            <div class="card" style="width: 18rem; float:right;">
                <div class="card-body">
                    <h6 class="card-title"><u>Mohon Pembayaran Dapat Di Transfer Ke Rekening :</u></h6>
                    <p style="font-size: 10pt; text-align: left;" class="card-text">No. Rekening : <b>{{ $nama_perusahaan->No_rek }}</b><br>
                        Cabang : <b>{{ $nama_perusahaan->nama_cabang }}</b><br>
                        A/N : <b>{{ $nama_perusahaan->nama_rek }}</b><br>
                        Konfirmasi pembayaran email : <i>{{ $nama_perusahaan->email_pembayaran }}</i> <br>
                        Terimakasih atas kepercayaan <br>
                        pada produk dan layanan kami</p>
                </div>
            </div>
        </div>
    </div>

</body>

</html>