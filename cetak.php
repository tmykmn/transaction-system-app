<!DOCTYPE html>
<html>
<head>
	<title>Original Printed</title>
</head>
<body>
	<center>
		<hr>
		<h2>DATA LAPORAN PENCUCIAN MOBIL</h2>
		<h4>Duyung Car Wash</h4>
		<hr>
	</center>
	<?php 
	include 'koneksi.php';
	?>

	<table border="1" style="width: 100%">
		<tr>
            <th>No</th>
            <th>Nota</th>
            <th>Nama Pelanggan</th>
            <th>Jenis Kendaraan</th>
            <th>Golongan Kendaraan</th>
            <th>Tanggal</th>
            <th>Total Bayar</th>
		</tr>
		<?php 
			$sql="select * from transaksi";
	        $hasil=mysqli_query($koneksi,$sql);
	        $no=1;
	        $totalnya=0;
	        while ($data = mysqli_fetch_array($hasil)) {
	        	$totalnya += $data["biaya"];
		?>
		<tr>
			<td><?php echo $no++;?></td>
            <td><?php echo $data["no_nota"]; ?></td>
            <td><?php echo $data["nama"]; ?></td>
            <td><?php echo $data["jenis_kendaraan"]; ?></td>
            <td><?php echo $data["gol_kendaraan"]; ?></td>
            <td><?php echo $data["tanggal"]; ?></td>
            <td><?php echo "Rp.".$data["biaya"].",-"; ?></td>
		</tr>
		<?php 
		}?>
		<tr>
			<td colspan="6"><center><b>Total Pemasukan Duyung Car Wash : </b></center></td>
			<td>Rp.<?=$totalnya;?>,-</td>
		</tr>
	</table>
	<hr>
	<center>
	<h4 align="right"><b>Pekanbaru,</b> <?=date('d-m-Y')?></h4><br>
	<h4 align="right">Duyung Car Wash</h4>
	</center>
	<script>
		window.print();
	</script>
</body>
</html>