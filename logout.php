<?php
session_start();
session_destroy();
echo "<script>alert('Anda Berhasil Logout !!!');history.go(-1)</script>";
//header("Location:login.php");
?>