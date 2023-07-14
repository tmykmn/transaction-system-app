<?php 
	include 'koneksi.php';
if(isset($_POST['editData'])){
		$jeken 	= $_POST['jeken'];
		$goken  = $_POST['goken'];
		$biaya 	= $_POST['biaya'];
		$id 	= $_POST['id_biaya'];
		$sql = mysqli_query($koneksi, "UPDATE databiaya SET jenis_kendaraan='$jeken', gol_kendaraan='$goken', biaya='$biaya' WHERE id_biaya='$id'");
		if($sql){
			echo "<script>alert('Data Harga Berhasil Diedit !!!');history.go(-1)</script>";
			die();
		}else{
			echo "<script>alert('Data Harga Gagal Diedit !!!');history.go(-1)</script>";
		}
	} 
 ?>