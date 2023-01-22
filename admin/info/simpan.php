<?php 
 require '../../configuration/dbcon.php';

$username    = $_POST['username'];
$password	 = $_POST['password'];
$nama	 	 = $_POST['nama'];
$level	 	 = $_POST['level'];

$sql = mysqli_query($db,"INSERT INTO pegawai VALUES('','$username','$password','$nama','$level')");

if ($sql) {
	echo "<script>alert('Data Tersimpan');
		window.location='../index.php?action=user'
	</script>";
}else {
	echo "<script>alert('Gagal Tersimpan');
		window.location='../index.php?action=user'
	</script>";
}