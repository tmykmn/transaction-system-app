<?php 
$title = "Duyung Car Wash | Data Harga";
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
            <h1 class="m-0 text-dark">Data Harga</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Harga</li>
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
              <!-- /.modal tambah data start -->
                <div class="modal fade" id="modal-tambahData">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Harga</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" role="form" action="tambah_biaya.php">
                          <div class="form-group">
                              <div class="row">
                                <div class="col-12">
                                  <label for="biaya">Jenis Kendaraan</label>
                                  <input type="text" class="form-control" id="jeken" name="jeken" placeholder="Jenis Kendaraan" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <label for="biaya">Golongan Kendaraan</label>
                                  <input type="text" class="form-control" id="goken" name="goken" placeholder="Golongan Kendaraan" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <label for="biaya">Biaya</label>
                                  <input type="number" class="form-control" id="biaya" name="biaya" placeholder="Harga / Biaya" required>
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
                <button type="button" class="btn btn-success btn-s pull-right" data-toggle="modal" data-target="#modal-tambahData">Tambah Data Harga
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-1" style="height: 400px;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Jenis Kendaraan</th>
                    <th>Golongan Kendaraan</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "koneksi.php";
                    $sql = mysqli_query($koneksi, "SELECT * FROM databiaya");
                    if(mysqli_num_rows($sql) > 0){
                      $no = 0;
                      while($row = mysqli_fetch_array($sql)){
                        $no++;?>
                        <tr>
                        <td><?=$no;?></td>
                        <td><?=$row['jenis_kendaraan']?></td>
                        <td><?=$row['gol_kendaraan']?></td>
                        <td><?=$row['biaya']?></td>
                        <td>
                          <a href="#" class="btn btn-warning btn-s pull-right" data-toggle="modal" data-target="#modal-editData<?=$row['id_biaya'];?>"><i class="fa fa-edit"></i></a>
                          <a href="hapus_biaya.php?id=<?=$row['id_biaya']?>" onclick="return konfirmasi()" class="btn btn-danger btn-s"><i class="fa fa-trash"></i></a>
                        </td>
                        <script type="text/javascript" language="JavaScript">
                          function konfirmasi(){
                          tanya = confirm("Anda yakin akan menghapus harga ini?");
                            if (tanya == true) return true;
                            else return false;
                          }
                        </script>
                        <!-- /.modal edit data start -->
                <div class="modal fade" id="modal-editData<?=$row['id_biaya'];?>">
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
                          $idnyo = $row['id_biaya']; 
                          $query_edit = mysqli_query($koneksi,"SELECT * FROM databiaya WHERE id_biaya='$idnyo'");
                          while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <form method="POST" role="form" action="edit_biaya.php">
                          <div class="form-group">
                              <div class="row">
                                <div class="col-12">
                                  <label for="biaya">Jenis Kendaraan</label>
                                  <input type="hidden" id="id_biaya" name="id_biaya" value="<?=$row['id_biaya']?>" required>
                                  <input type="text" class="form-control" id="jeken" name="jeken" placeholder="Jenis Kendaraan" value="<?=$row['jenis_kendaraan']?>" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <label for="biaya">Golongan Kendaraan</label>
                                  <input type="text" class="form-control" id="goken" name="goken" placeholder="Golongan Kendaraan" value="<?=$row['gol_kendaraan']?>" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <label for="biaya">Harga</label>
                                  <input type="number" class="form-control" id="biaya" name="biaya" placeholder="Harga / Biaya" value="<?=$row['biaya']?>" required>
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
                     <?php }} ?> 
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
