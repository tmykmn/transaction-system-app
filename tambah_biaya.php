<?php 
	include 'koneksi.php';
if(isset($_POST['submit'])){
		$jeken 	= $_POST['jeken'];
		$goken	= $_POST['goken'];
		$biaya 	= $_POST['biaya'];
		$sql = mysqli_query($koneksi, "INSERT INTO databiaya(jenis_kendaraan,gol_kendaraan,biaya) VALUES('$jeken', '$goken','$biaya')");
		if($sql){
			echo "<script>alert('Data Harga Berhasil Ditambahkan !!!');history.go(-1)</script>";
			die();
		}else{
			echo "<script>alert('Data Harga Gagal Ditambahkan !!!');history.go(-1)</script>";
		}
	} 
 ?>