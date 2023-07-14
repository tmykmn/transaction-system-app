<?php 
	include 'koneksi.php';
	$idnya = $_GET['id'];
	$sql = mysqli_query($koneksi, "DELETE FROM databiaya WHERE id_biaya='$idnya'");
	if($sql){
		echo "<script>alert('Data Harga Berhasil Dihapus !!!');history.go(-1)</script>";
		die();
	}else {
		echo "<script>alert('Data Harga Gagal Dihapus !!!');history.go(-1)</script>";
	}
 ?>