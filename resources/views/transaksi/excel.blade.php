<!DOCTYPE html>
<html>
<head>
	<title>Export Laporan Excel Pada Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<center>
			<h4>DRAFT INVOICE PM</h4>
		</center>
			<br>
               <br>
		<table class='table table-bordered'>
			<thead>
				<tr>
                         <th>No</th>
                         <th>Nama Pelanggan</th>
                         <th>No Invoice</th>
                         <th>Jasa</th>
                         <th>Jumlah</th>
                         <th>Harga</th>
                         <th>Satuan</th>
                         <th>Material</th>
                         <th>Material Harga</th>
                         {{-- <th>PPN</th> --}}
                         <th>Sub Total</th>
				</tr>
			</thead>
			<tbody>
                    <?php $tot_harga = 0; ?>
				@php $i=1 @endphp
				@foreach($trans as $trs)
     				<tr>
                              <td align="center" valign="center" rowspan="{{ $trs->lines_count + 1 }}">{{ $i++ }}</td>
                              <td align="center" valign="center" rowspan="{{ $trs->lines_count + 1 }}">{{ $trs->customers->nama }}</td>
                              <td align="center" valign="center" rowspan="{{ $trs->lines_count + 1 }}">{{ $trs->no_invoice }}</td>
                              
                              @foreach($trs->lines as $e=>$ln)
                              <tr>
                                   <td colspan="">{{ $ln->jasas->nama }}</td>
                                   <td colspan="">{{ $ln->jumlah }}</td>
                                   <td colspan="">Rp. {{ number_format($ln->harga,0) }}</td>
                                   <td>{{ $ln->satuan }}</td>
                                   <td>{{ $ln->materials->nama }}</td>
                                   <td>{{ $ln->material_harga }}</td>
                                   {{-- <td>{{ $ln->ppn }}</td> --}}
                                   <td>{{ $ln->grand_total }}</td>
                                   <?php $tot_harga += $ln->grand_total; ?>
                              </tr>
                              @endforeach
     				<!-- </tr> -->
				@endforeach
			</tbody>
               {{-- <tfoot>
                    <tr>
                         <th></th>
                         <th></th>
                         <th></th>
                         <th></th>
                         <th colspan="6">
                              <b><i>Total</i></b>
                         </th>
                         <th>
                              <b><i>Rp. {{ number_format($trs->grand_total,0) }}</i></b>
                         </th>
                    </tr>
               </tfoot> --}}
		</table>
	</div>

     <br>
     <br>
     <table class="">
          <tbody>
               <tr>
                    <th></th>
                    <th style="width: 20px;">
                         <center>
                              JAKARTA, {{date('d M Y')}}
                         </center>
                    </th>
               </tr>
               <tr>
                    <th></th>
                    <th align="center">
                         <center>
                              Dibuat,
                         </center>
                    </th>
               </tr>

               <tr>
                    <th></th>
                    <th align="center">
                         <center>
                              PT. ALMAJARA INDOTAMA
                         </center>
                    </th>
               </tr>

               <tr>
                    <th></th>
                    <th></th>
               </tr>
               <tr>
                    <th></th>
                    <th></th>
               </tr>
               <tr>
                    <th></th>
                    <th></th>
               </tr>
               <tr>
                    <th></th>
                    <th></th>
               </tr>
               <tr>
                    <th></th>
                    <th></th>
               </tr>

               <tr>
                    <th></th>
                    <th align="center">
                         <center>
                              Aldi Al-Ghofky
                         </center>
                    </th>
               </tr>

               <tr>
                    <th></th>
                    <th align="center">
                         <center>
                              Admin Project
                         </center>
                    </th>
               </tr>
          </tbody>
     </table>

</body>
</html>