<?php 
$title = "Duyung Car Wash | Data Admin";
include 'navbar.php';
?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Admin</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
<section class="content">
  <div class="container-fluid"> 
    <div class="card">
      <div class="card-header">
        <a href="cetak.php" target="_blank" class="btn btn-success btn-s pull-right">Cetak Laporan Keseluruhan
        </a>
      </div>
      <div class="card-body table-responsive p-1" style="height: 400px;">
        <form method="POST" role="form" action="cetakLaporan.php">
          <div class="form-group">
            <div class="row ml-2">
              <div class="col-3">
                <label for="awal">Dari</label>
                <input type="date" class="form-control" name="awal" required>
              </div>
              <div class="col-3">
                <label for="akhir">Sampai</label>
                <input type="date" class="form-control" name="akhir" required>
              </div>
              <div class="col-2">
                <br>
                <button type="submit" class="btn btn-success btn-s pull-right" id="submit" formtarget="_blank" name="submit">Cetak</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div> 
</section>
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<?php include "footer.php";?>
</body>
</html>
