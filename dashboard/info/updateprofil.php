<?php

require '../../configuration/dbcon.php';

$id 	 		 = $_POST['id'];
$username		 = $_POST['username'];
$password	 	 = $_POST['password'];
$nama 			 = $_POST['nama'];

$sql = mysqli_query($db,"UPDATE pegawai SET id='$id',username='$username',password='$password',nama='$nama' WHERE id='$id'");

if ($sql) {
	session_start();
	session_destroy();
	echo "<script>alert('data dirubah, silahkan login kembali');
		window.location='../../index.php'
	</script>";
}else {
	echo "<script>alert('Gagal');
		window.location='../index.php?action=profil'
	</script>";
}