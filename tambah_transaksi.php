<?php 
	include 'koneksi.php';
if(isset( $_POST['submit'] )){
		$no_nota 	 	 = $_POST['no_nota'];
		$nama 		 	 = $_POST['nama'];
		$jenis_kendaraan = $_POST['jenis_kendaraan'];
		$gol_kendaraan 	 = $_POST['gol_kendaraan'];
		$biaya 			 = $_POST['biaya'];
		$bayar 			 = $_POST['bayar'];
		$kembalian 		 = $_POST['kembalian'];
		$rf = mysqli_query($koneksi, "SELECT gol_kendaraan, jenis_kendaraan FROM databiaya WHERE biaya='$biaya'");
		$sql = false;
		if(mysqli_num_rows($rf) > 0){
			while($row = mysqli_fetch_array($rf)){
				$rs = $row['gol_kendaraan'];
				$rr = $row['jenis_kendaraan'];
				$sql = mysqli_query($koneksi, "INSERT INTO transaksi(no_nota, nama, jenis_kendaraan, gol_kendaraan, biaya, bayar, kembalian, tanggal) VALUES('$no_nota', '$nama', '$rr','$rs', '$biaya', '$bayar', '$kembalian', NOW())");
			}
		}
		if($sql){
			echo "<script>alert('Data Transaksi Berhasil Ditambahkan !!!');history.go(-1)</script>";
			die();
		}else{
			echo "<script>alert('Data Transaksi Gagal Ditambahkan !!!');history.go(-1)</script>";
		}
	} 
 ?>