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
              <!-- /.modal tambah data start -->
                <div class="modal fade" id="modal-tambahData">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Tambah Data Admin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <form method="POST" role="form" action="tambah_user.php">
                          <div class="form-group">
                              <div class="row">
                                <div class="col-12">
                                  <label for="biaya">Nama</label>
                                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" autocomplete="off" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <label for="biaya">Username</label>
                                  <input type="text" class="form-control" id="username" name="username" placeholder="Nama Pengguna" autocomplete="off" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <label for="biaya">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" required>
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
                <button type="button" class="btn btn-success btn-s pull-right" data-toggle="modal" data-target="#modal-tambahData">Tambah Data Admin
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-1" style="height: 400px;">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php
                    include "koneksi.php";
                    $sql="SELECT * FROM user";
                    $hasil=mysqli_query($koneksi,$sql);
                    $no=1;
                   while ($data = mysqli_fetch_array($hasil)) {
                     ?>
                        <tr>
                        <td><?php echo $no++;?></td>
                        <td><?php echo $data["nama"]; ?></td>
                        <td><?php echo $data["username"]; ?></td>
                        <td><?php echo "*******"; ?></td>
                        <td>
                          <a href="#" class="btn btn-warning btn-s pull-right" data-toggle="modal" data-target="#modal-editData<?=$data['id_user'];?>"><i class="fa fa-edit"></i></a>
                          <a href="hapus_user.php?id=<?php echo htmlspecialchars($data['id_user']); ?>" class="btn btn-danger" onclick="return konfirmasi()" role="button"><i class="fa fa-trash"></i></a>
                        </td>
                        <script type="text/javascript" language="JavaScript">
                          function konfirmasi(){
                          tanya = confirm("Anda yakin akan menghapus admin ini?");
                            if (tanya == true) return true;
                            else return false;
                          }
                        </script>
                <!-- /.modal edit data start -->
                <div class="modal fade" id="modal-editData<?=$data['id_user'];?>">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Edit Data Admin</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <?php
                          $idnyo = $data['id_user']; 
                          $query_edit = mysqli_query($koneksi,"SELECT * FROM user WHERE id_user='$idnyo'");
                          while ($row = mysqli_fetch_array($query_edit)) {  
                        ?>
                        <form method="POST" role="form" action="edit_user.php">
                          <div class="form-group">
                              <div class="row">
                                <div class="col-12">
                                  <label for="biaya">Nama</label>
                                  <input type="hidden" id="id_user" name="id_user" value="<?=$row['id_user']?>" required>
                                  <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?=$row['nama']?>" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <label for="biaya">Username</label>
                                  <input type="text" class="form-control" id="username" name="username" placeholder="Nama Pengguna" value="<?=$row['username']?>" required>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-12">
                                  <label for="biaya">Password</label>
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Kata Sandi" value="<?=$row['password']?>" required>
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
