<?php
session_start();
if($_SESSION['status']!="loginAdmin"){
  header("Location: ./login.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$title;?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> 
    </ul>
  </nav>
  <!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/avatar04.png" alt="DCW Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light"><?=$_SESSION['nama'];?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-header">MENU UTAMA</li>
          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fas fa-chart-pie mr-2"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">PENJUALAN</li>
          <li class="nav-item">
            <a href="tampil_transaksi.php" class="nav-link">
              <i class="nav-icon fas fa-shopping-cart mr-2"></i>
              <p>
                Transaksi
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="tampil_cetak.php" class="nav-link">
              <i class="nav-icon fas fa-print mr-2"></i>
              <p>
                Laporan
              </p>
            </a>
          </li>
          <li class="nav-header">DATA MASTER</li>
          <li class="nav-item">
            <a href="tampil_datauser.php" class="nav-link">
              <i class="nav-icon fas fa-users mr-2"></i>
              <p>
                Data Admin
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="tampil_databiaya.php" class="nav-link">
              <i class="nav-icon fas fa-hand-holding-usd mr-2"></i>
              <p>Data Harga</p>
            </a>
          </li>
          <li class="nav-header">OTHER</li>
          <li class="nav-item">
            <a href="logout.php" onclick="return konfirmasi()" class="nav-link">
              <i class="nav-icon fas fa-sign-out-alt mr-2"></i>
              <p>Log Out</p>
            </a>
          </li>
          <script type="text/javascript" language="JavaScript">
            function konfirmasi(){
              tanya = confirm("Anda yakin ingin logout ?");
              if (tanya == true) return true;
              else return false;
            }
          </script>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>