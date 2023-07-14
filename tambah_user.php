<?php 
	include 'koneksi.php';
if(isset($_POST['submit'])){
		$nama 			 = $_POST['nama'];
		$username		 = $_POST['username'];
		$password 		 = $_POST['password'];
		$sql = mysqli_query($koneksi, "INSERT INTO user(username,password,nama) VALUES('$username', '$password','$nama')");
		if($sql){
			echo "<script>alert('Admin Berhasil Ditambahkan !!!');history.go(-1)</script>";
			die();
		}else{
			echo "<script>alert('Admin Gagal Ditambahkan !!!');history.go(-1)</script>";
		}
	} 
 ?>