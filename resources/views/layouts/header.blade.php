<!-- Logo -->
<?php

$dt = \App\User::where('id', \Auth::user()->id)->first();

?>

<a href="{{ url('home') }}" class="logo">
  <!-- mini logo for sidebar mini 50x50 pixels -->
  <span class="logo-mini"><b>Almajara</b></span>
  <!-- logo for regular state and mobile devices -->
  <span class="logo-lg"><b>{{ \Auth::user()->name }}</b></span>
</a>

<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
  <!-- Sidebar toggle button-->
  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
  </a>

  <span>
    <?php
    $tanggal = mktime(date("m"), date("d"), date("Y"));
    echo "Tanggal : <b>" . date("d-M-Y", $tanggal) . "</b> ";
    date_default_timezone_set('Asia/Jakarta');
    $jam = date("H:i:s");
    echo "| Pukul : <b>" . $jam . " " . "</b>";
    $a = date("H");
    if (($a >= 6) && ($a <= 11)) {
      echo "<b>, Selamat Pagi !!</b>";
    } else if (($a > 11) && ($a <= 15)) {
      echo ", Selamat Siang !!";
    } else if (($a > 15) && ($a <= 18)) {
      echo ", Selamat Sore !!";
    } else {
      echo ", <b> Selamat Malam </b>";
    }
    ?>
    <span><i>{{ \Auth::user()->name }}</i></span>
  </span>

  <div class="navbar-custom-menu">
    <ul class="nav navbar-nav">
      <li class="dropdown notifications-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <i class="fa fa-bell-o"></i>
          <span class="label label-warning"></span>
        </a>
        <ul class="dropdown-menu">
          <li class="header">Pemberitahuan</li>
          <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
              <li>
                <a href="#">
                  <i class="fa fa-warning text-yellow">Jangan Berikan Password Kepada Siapapun</i>
                </a>
              </li>
            </ul>
          </li>
          <li class="footer"><a href="">View all</a></li>
        </ul>
      </li>

      <li class="dropdown user user-menu">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <img src="{{asset(\Auth::user()->avatar)}}" class="user-image" alt="User Image">
          <span class="hidden-xs">{{\Auth::user()->name}}</span>
        </a>
        <ul class="dropdown-menu">
          <!-- User image -->
          <li class="user-header">
            <img src="{{asset(\Auth::user()->avatar)}}" class="img-circle" alt="User Image">

            <p>
              {{\Auth::user()->name}}
              <small>{{ \Auth::user()->email }}</small>
            </p>
          </li>
          <!-- Menu Footer-->
          <li class="user-footer">
            <div class="pull-left">
              <a href="{{ route('user.edit') }}" class="btn btn-default btn-flat menu-sidebar">Profile</a>
            </div>
            <div class="pull-right">
              <a href="{{ url('keluar') }}" class="btn btn-default btn-flat menu-sidebar">Sign out</a>
            </div>
          </li>
        </ul>
      </li>

    </ul>
  </div>

</nav>