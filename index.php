<?php 
$title = "Duyung Car Wash | Dashboard";
include 'navbar.php';
include 'koneksi.php';

//Menentukan Bulan Untuk Chart
$label = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
$thnNow = date('Y');
// $thnNow = 2020;
for($bulan = 1;$bulan < 13;$bulan++)
{
  $query = mysqli_query($koneksi,"SELECT SUM(biaya) as jumlah from transaksi where MONTH(tanggal)='$bulan' AND YEAR(tanggal)='$thnNow'");
  $row = $query->fetch_array();
  $jumlah_transaksi[] = $row['jumlah'];
}
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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
<section class="content">
  <div class="container-fluid"> 
    <div class="row"> <!-- row start box -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <?php 
                $tglToday = date('Y-m-d');
                $sql="SELECT * FROM transaksi WHERE tanggal='$tglToday' AND YEAR(tanggal)='$thnNow'";
                $hasil = mysqli_query($koneksi,$sql);
                $totalnya=0;
                while ($data = mysqli_fetch_array($hasil)) {
                  $totalnya += $data["biaya"];
                }
              ?>
              <div class="inner">
                <h3>Rp.<?=$totalnya?>,-</h3>
                <p>Pendapatan Hari Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="cetakLaporan.php?tgl=<?=$tglToday?>" target="_blank" class="small-box-footer">Cetak <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <?php 
                $blnNow = date('m');
                $sqlBln="SELECT * FROM transaksi WHERE MONTH(tanggal)='$blnNow' AND YEAR(tanggal)='$thnNow'";
                $hasilBln = mysqli_query($koneksi,$sqlBln);
                $totalBln=0;
                while ($data = mysqli_fetch_array($hasilBln)) {
                  $totalBln += $data["biaya"];
                }
              ?>
              <div class="inner">
                <h3>Rp.<?=$totalBln?>,-</h3>
                <p>Pendapatan Bulan Ini</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="cetakLaporan.php?bln=<?=$blnNow?>" target="_blank" class="small-box-footer">Cetak <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <?php
                    $sql = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM transaksi");
                    $result = mysqli_fetch_array($sql);
                    echo "<h3>".$result['jumlah']." Transaksi</h3>";
                    ?>
                <p>Data Transaksi Keseluruhan</p>
              </div>
              <div class="icon">
                <i class="nav-icon fas fa-shopping-cart"></i>
              </div>
              <a href="tampil_transaksi.php" class="small-box-footer">Kelola Transaksi <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <?php
                    $sql = mysqli_query($koneksi, "SELECT COUNT(*) AS jumlah FROM user");
                    $result = mysqli_fetch_array($sql);
                    echo "<h3>".$result['jumlah']." Admin</h3>";
                    ?>
                <p>Total Data Admin</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="tampil_datauser.php" class="small-box-footer">Kelola Admin <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div> <!-- row end box -->
        <div class="row">
          <div class="col-lg-12 col-12">
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Grafik Pendapatan Tahun Ini</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div class="chart">
                  <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
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
<script>
$(function () {
    var areaChartData = {
      labels  : <?php echo json_encode($label); ?>,
      datasets: [
        {
          label               : 'Transaksi Cucian',
          backgroundColor     : 'rgba(60,141,188,0.9)',
          borderColor         : 'rgba(60,141,188,0.8)',
          pointRadius          : false,
          pointColor          : '#3b8bba',
          pointStrokeColor    : 'rgba(60,141,188,1)',
          pointHighlightFill  : '#fff',
          pointHighlightStroke: 'rgba(60,141,188,1)',
          data                : <?php echo json_encode($jumlah_transaksi); ?>
        },
      ]
    }

    var barChartCanvas = $('#barChart').get(0).getContext('2d')
    var barChartData = jQuery.extend(true, {}, areaChartData)
    var temp0 = areaChartData.datasets[0]
    barChartData.datasets[0] = temp0

    var barChartOptions = {
      responsive              : true,
      maintainAspectRatio     : false,
      datasetFill             : false
    }

    var barChart = new Chart(barChartCanvas, {
      type: 'bar', 
      data: barChartData,
      options: barChartOptions
    })
})
</script>
</body>
</html>
