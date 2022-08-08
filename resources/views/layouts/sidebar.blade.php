<section class="sidebar">
  <!-- Sidebar user panel -->
  <!-- /.search form -->
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
    @if(\Auth::user()->email == 'admin@almajara.co.id')

    <li class="menu-sidebar"><a href="{{ url('/beranda') }}"><span class="fa fa-home"></span>Beranda</span></a></li>

    <li class="menu-sidebar"><a href="{{ url('/jenis-jasa') }}"><span class="fa  fa-wrench"></span>Jenis Jasa</span></a></li>

    <li class="menu-sidebar"><a href="{{ url('/jenis-material') }}"><span class="fa  fa-cubes"></span>Jenis Material</span></a></li>

    <li class="menu-sidebar"><a href="{{ url('/customer') }}"><span class="fa fa-users"></span>Customer</span></a></li>

    <li class="menu-sidebar"><a href="{{ url('/karyawan') }}"><span class="fa fa-male"></span>Karyawan</span></a></li>

    <li class="menu-sidebar"><a href="{{ url('/status-pengerjaan') }}"><span class="fa fa-area-chart"></span>Status Pengerjaan</span></a></li>

    <li class="menu-sidebar"><a href="{{ url('/status-pembayaran') }}"><span class="fa fa-money"></span>Status Pembayaran</span></a></li>

    <li class="menu-sidebar"><a href="{{ url('/transaksi') }}"><span class="fa fa-cc-visa"></span>Transaksi & Laporan</span></a></li>
    @endif

    

    @if(\Auth::user()->role == '1')
    <li class="menu-sidebar"><a href="{{ url('/beranda') }}"><span class="fa fa-home"></span>Beranda</span></a></li>

    <li class="menu-sidebar"><a href="{{ url('/jenis-jasa') }}"><span class="fa  fa-wrench"></span>Jenis Jasa</span></a></li>

    <li class="menu-sidebar"><a href="{{ url('/jenis-material') }}"><span class="fa  fa-cubes"></span>Jenis Material</span></a></li>

    <li class="menu-sidebar"><a href="{{ url('/customer') }}"><span class="fa fa-users"></span>Customer</span></a></li>

    <li class="menu-sidebar"><a href="{{ url('/karyawan') }}"><span class="fa fa-male"></span>Karyawan</span></a></li>

    <li class="menu-sidebar"><a href="{{ url('/status-pengerjaan') }}"><span class="fa fa-area-chart"></span>Status Pengerjaan</span></a></li>

    <li class="menu-sidebar"><a href="{{ url('/status-pembayaran') }}"><span class="fa fa-money"></span>Status Pembayaran</span></a></li>

    <li class="menu-sidebar"><a href="{{ url('/transaksi') }}"><span class="fa fa-cc-visa"></span>Transaksi & Laporan</span></a></li>

    <li class="menu-sidebar"><a href="{{ url('/nama_perusahaan') }}"><span class="fa fa-file-text-o"></span>Manage Nama Perusahaan</span></a></li>

    <!-- <li class="menu-sidebar"><a href="{{ url('/reset-password') }}"><span class="glyphicon glyphicon-log-out"></span> Reset Password</span></a></li> -->

    @endif

    <li class="header">OTHER</li>

    <li class="menu-sidebar"><a href="{{ url('/keluar') }}"><span class="glyphicon glyphicon-log-out"></span> Logout</span></a></li>


  </ul>
</section>