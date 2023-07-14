<?php 
	include 'koneksi.php';
	$idnya = $_GET['id'];
	$sql = mysqli_query($koneksi, "DELETE FROM user WHERE id_user='$idnya'");
	if($sql){
		echo "<script>alert('Data Admin Berhasil Dihapus !!!');history.go(-1)</script>";
		die();
	}else {
		echo "<script>alert('Data Admin Gagal Dihapus !!!');history.go(-1)</script>";
	}
 ?>