<?php 
	include 'koneksi.php';
	$idnya = $_GET['id'];
	$sql = mysqli_query($koneksi, "DELETE FROM transaksi WHERE no_nota='$idnya'");
	if($sql){
		echo "<script>alert('Data Transaksi Berhasil Dihapus !!!');history.go(-1)</script>";
		die();
	}else {
		echo "<script>alert('Data Transaksi Gagal Dihapus !!!');history.go(-1)</script>";
	}
 ?>