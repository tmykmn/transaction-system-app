<?php
include'koneksi.php';
if(isset($_GET['by'])){
	$wew = $_GET['by'];
 	$q = mysqli_query($koneksi, "SELECT biaya FROM databiaya WHERE gol_kendaraan='$wew' ");
 	while($data = mysqli_fetch_array($q)){
   		echo ''.$data['biaya'];
   	}
}else{
	echo '<option>--Data Tidak Ada--</option>';
}
?>