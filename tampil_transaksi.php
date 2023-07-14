<?php
$title = "Duyung Car Wash | Data Transaksi";
include 'navbar.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Data Transaksi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Transaksi</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
<?php include'koneksi.php'?>


    <!-- Main content -->
<section class="content">
  <div class="container-fluid"> 
    <div class="card">
               <!-- /.modal tambah data start -->
                <div class="modal fade" id="modal-tambahData">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Transaksi</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" role="form" action="tambah_transaksi.php">
                          <div class="form-group">
                              <div class="row">
                                <div class="col-12">
                                  <label for="no_nota">No. Nota</label>
                                  <?php
                                    include 'koneksi.php';
                                    $sql = mysqli_query($koneksi, "SELECT no_nota FROM transaksi");
                                     echo '<input type="text" class="form-control" id="no_nota" value="';
                                    $no_nota = "MB001";
                                    if(mysqli_num_rows($sql) == 0){
                                        echo $no_nota;
                                     }
                                    $result = mysqli_num_rows($sql);
                                     $counter = 0;
                                     while(list($no_nota) = mysqli_fetch_array($sql)){
                                      if (++$counter == $result) {
                                          $no_nota++;
                                          echo $no_nota;
                                      }
                                    }
                                    echo '"name="no_nota" readonly>';
                                  ?>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <label for="nama">Nama Pelanggan</label>
                                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Pelanggan" autocomplete="off" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <label for="jenismobil">Jenis Kendaraan</label>
                                  <select name="jenis_kendaraan" class="form-control" id="jenis_kendaraan" required>
                                  <option value="" disable>--- Pilih Jenis kendaraan ---</option>
                                  <?php
                                   $q = mysqli_query($koneksi, "SELECT DISTINCT jenis_kendaraan FROM databiaya WHERE jenis_kendaraan IS NOT NULL;");
                                   while($data = mysqli_fetch_array($q)){
                                     echo '<option value="'.$data['jenis_kendaraan'].'">'.$data['jenis_kendaraan'].'</option>';
                                   }
                                  ?>
                                </select>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <label for="jenismobil">Golongan Kendaraan</label>
                                  <select name="gol_kendaraan" class="form-control" id="gol_kendaraan" required>
                                    <option value="" disable>--- Pilih Golongan kendaraan ---</option>
                                  </select>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <label for="biaya">Biaya</label>
                                  <input type="number" class="form-control" id="biaya" name="biaya" placeholder="-" required readonly="">
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <label for="bayar">Total Bayar</label>
                                  <input type="number" class="form-control" id="bayar" name="bayar" placeholder="Isi dengan angka" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <label for="kembalian">Kembalian</label>
                                  <input type="number" class="form-control" id="kembalian" name="kembalian" value"" required readonly>
                                </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success" id="submit" name="submit">Tambah</button>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              <!-- /.modal-tambah-data-end -->
              <div class="card-header">
                <button type="button" class="btn btn-success btn-s pull-right" data-toggle="modal" data-target="#modal-tambahData">Tambah Data Transaksi
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-1" style="height: 400px;">
                <?php
                  if (isset($_GET['no_nota'])) {
                   $no_nota=htmlspecialchars($_GET["no_nota"]);
                   $sql="delete from transaksi where no_nota='$no_nota' ";
                   $hasil=mysqli_query($koneksi,$sql);
                  if ($hasil) {
                    echo "<div class='alert alert-success'> Data Sukses dihapus.</div>";
                    header("Location:transaksi.php");
                  }
                  else {echo "<div class='alert alert-danger'> Data Gagal dihapus.</div>";}
                 }
                ?>
                <table table id="example0" class="table table-bordered table-striped ">
                  <thead>
                  <tr>
                    <th>Nota</th>
                    <th>Nama Pelanggan</th>
                    <th>Jenis Kendaraan</th>
                    <th>Golongan Kendaraan</th>
                    <th>Total Bayar</th>
                    <th>Tanggal</th>
                    <th>Aski</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    
                    $sql="SELECT * FROM transaksi";

                     $hasil=mysqli_query($koneksi,$sql);
                    $no=1;
                   while ($data = mysqli_fetch_array($hasil)) {
                     ?>

                        <tr>
                        <td><?php echo $data["no_nota"]; ?></td>
                        <td><?php echo $data["nama"]; ?></td>
                        <td><?php echo $data["jenis_kendaraan"]; ?></td>
                        <td><?php echo $data["gol_kendaraan"]; ?></td>
                        <td><?php echo $data["biaya"]; ?></td>
                        <?php $uwu = date_create($data["tanggal"]); ?>
                        <td><?php echo date_format($uwu ,"d/m/Y") ?></td>
                        <td>
                          <a href="#" class="btn btn-warning btn-s pull-right" data-toggle="modal" data-target="#modal-editData<?=$data['no_nota'];?>"><i class="fa fa-edit"></i></a>

                          <a href="hapus_transaksi.php?id=<?=$data['no_nota']?>" onclick="return konfirmasi()" class="btn btn-danger btn-s"><i class="fa fa-trash"></i></a>

                          <a href="cetak_per_data.php?id=<?=$data['no_nota']?>" target="_blank" class="btn btn-success btn-s"><i class="fas fa-print"></i></a>
                        </td>
                        <script type="text/javascript" language="JavaScript">
                          function konfirmasi(){
                          tanya = confirm("Anda yakin akan menghapus data transaksi ini?");
                            if (tanya == true) return true;
                            else return false;
                          }
                        </script>
                        <!-- /.modal edit data start -->
                <div class="modal fade" id="modal-editData<?=$data['no_nota'];?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Edit Data User</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?php
                          $idnyo = $data['no_nota']; 
                          $query_edit = mysqli_query($koneksi,"SELECT * FROM transaksi WHERE no_nota='$idnyo'");
                          while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <form method="POST" role="form" action="edit_transaksi.php">
                          <div class="form-group">
                              <div class="row">
                                <div class="col-12">
                                  <label for="nama">Nama Pelanggan</label>
                                  <input type="hidden" name="no_nota" value="<?=$row['no_nota']?>">
                                  <input type="text" class="form-control" id="nama" name="nama" value="<?=$row['nama']?>" required>
                                </div>
                              </div>
                          </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-dark" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning" id="editData" name="editData">Edit</button>
                      </div>
                      </form>
                    <?php }?>
                    </div>
                  </div>
                </div>
              <!-- /.modal-edit-data-end -->
                     <?php } ?> 
                  </tbody>
                </table>
              </div> 

              <!-- /.card-body -->
            </div>
            <!-- /.card -->
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
