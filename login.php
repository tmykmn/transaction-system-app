<?php
session_start();
if(isset($_SESSION['status'])){
  //header("Location: ./index.php");
}
include "koneksi.php";
if(isset($_POST['submit'])){
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = mysqli_query($koneksi, "SELECT username, nama FROM user WHERE username='$username' AND password='$password'");
  if(mysqli_num_rows($query)>0){
    list($usernamee, $nama) = mysqli_fetch_array($query);
    $_SESSION['username'] = $usernamee;
    $_SESSION['nama'] = $nama;
    $_SESSION['status'] = "loginAdmin";
    header("Location:index.php");
  } else {
    echo "<script>alert('Maaf Username / Password Salah !!!');history.go(-1)</script>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Duyung Car Wash | Log in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="login.php"><b>Duyung</b> Car Wash</a>
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Silahkan Masukkan Username & Password</p>
      <form action="login.php" method="POST" id="quickForm">
        <div class="form-group">
        <div class="input-group mb-3">
          <input type="username" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group">
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
      </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div class="col-4">
            <button type="submit" name="submit" id="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="plugins/jquery-validation/additional-methods.min.js"></script>
<script src="dist/js/adminlte.min.js"></script>
<script src="dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  $('#quickForm').validate({
    rules: {
      username: {
        required: true,
      },
      password: {
        required: true,
        minlength: 5
      },
    },
    messages: {
      username: {
        required: "Username Tidak Boleh Kosong !"
      },
      password: {
        required: "Password Tidak Boleh Kosong !",
        minlength: "Password Minimal 5 Karakter"
      },
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.form-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});
</script>
</body>
</html>
