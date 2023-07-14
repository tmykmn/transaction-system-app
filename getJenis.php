<?php
include'koneksi.php';
if(isset($_GET['jns'])){
	$wew = $_GET['jns'];
 	$q = mysqli_query($koneksi, "SELECT gol_kendaraan FROM databiaya WHERE jenis_kendaraan='$wew' ");
 	echo '<option>---Pilih Golongan Kendaraan---</option>';
 	while($data = mysqli_fetch_array($q)){
   		echo '<option value="'.$data['gol_kendaraan'].'">'.$data['gol_kendaraan'].'</option>';
 	}
}else{
	echo '<option>--Data Tidak Ada--</option>';
}
?>