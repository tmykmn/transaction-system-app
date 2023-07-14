<!DOCTYPE html>
<html>
<head>
	<title>Original Printed</title>
</head>
<body>
	<center>
		<head>
		<h1><font face="Courier New" size="5">Duyung Auto Care</font></h1>
		<h1><font face="Courier New" size="3">Jl. Duyung no. 12, Tangkerang Barat, Pekanbaru</font></h1>
	</center>
	<?php 
	include 'koneksi.php';
	?>
	<font face="Courier New"/>
	<center>
	<table>

		<td colspan="4">------------------------------------------------------</td>
		<?php 
			$idnya = $_GET['id'];
			$sql="select * from transaksi where no_nota='$idnya'";
	        $hasil=mysqli_query($koneksi,$sql);
	        $no=1;
	        $totalnya=0;
	        while ($data = mysqli_fetch_array($hasil)) {
	        	$totalnya += $data["biaya"];
		?>
		<tr>
			<td>No Nota</td><td>:</td>
			<td> <?php echo $data["no_nota"];?></td>
		</tr>
		<tr>
			<td>Nama Pelanggan</td><td>:</td>
			<td> <?php echo $data["nama"];?></td>
		</tr>
		 <tr>
			<td>Jenis Kendaraan</td><td>:</td>
		 	<td><?php echo $data["jenis_kendaraan"];?></td>
		</tr>
 		<tr>
			<td>Golongan Kendaraan</td><td>:</td>
 			<td> <?php echo $data["gol_kendaraan"];?></td>
		</tr>
		<tr>
			<td>Tanggal</td><td>:</td>
			<?php $uwu = date_create($data["tanggal"]); ?>
 			<td> <?php echo date_format($uwu,"d/m/Y");?></td>
		</tr>
		<tr>
			<td>Biaya</td><td>:</td>
 			<td style="padding-left: 180px">
 			 <?php echo "Rp.". number_format($data["biaya"], 0, ".", ".");?></td>
		</tr>
		<td colspan="4">------------------------------------------------------</td>
		<tr>
			<td>Bayar</td><td>:</td>
 			<td style="padding-left: 180px">
 			 <?php echo "Rp.". number_format($data["bayar"], 0, ".", ".");?></td>
		</tr>
		<tr>
			<td>Total Bayar</td><td>:</td>
 			<td style="padding-left: 180px">
 			 <?php echo "Rp.". number_format($data["biaya"], 0, ".", ".");?></td>
		</tr>
		<tr>
			<td>Kembalian</td><td>:</td>
 			<td style="padding-left: 180px">
 			 <?php echo "Rp.". number_format($data["kembalian"], 0, ".", ".");?></td>
		</tr>
		<td colspan="4">------------------------------------------------------</td>
		<?php
		}?>
		</tr>
	</table>
	</center>
	<hr>
	<script>
		window.print();
	</script>
</body>
</html>