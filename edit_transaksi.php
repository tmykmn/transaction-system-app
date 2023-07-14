<?php 
	include 'koneksi.php';
if(isset($_POST['editData'])){
		$nama 	= $_POST['nama'];
		$no_nota 	= $_POST['no_nota'];
		$sql = mysqli_query($koneksi, "UPDATE transaksi SET nama='$nama' WHERE no_nota='$no_nota'");
		if($sql){
			echo "<script>alert('Data Transaksi Berhasil Diedit !!!');history.go(-1)</script>";
			die();
		}else{
			echo "<script>alert('Data Transaksi Gagal Diedit !!!');history.go(-1)</script>";
		}
	} 
 ?>