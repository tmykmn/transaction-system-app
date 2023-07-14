<?php 
	include 'koneksi.php';
if(isset($_POST['editData'])){
		$nama 	     = $_POST['nama'];
		$username    = $_POST['username'];
		$password 	 = $_POST['password'];
		$id 		 = $_POST['id_user'];
		$sql = mysqli_query($koneksi, "UPDATE user SET nama='$nama', username='$username', password='$password' WHERE id_user='$id'");
		if($sql){
			echo "<script>alert('Admin Berhasil Diedit !!!');history.go(-1)</script>";
			die();
		}else{
			echo "<script>alert('Admin Gagal Diedit !!!');history.go(-1)</script>";
		}
	} 
 ?>