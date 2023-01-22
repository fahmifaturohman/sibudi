<?php 


require '../configuration/dbcon.php';
$id = $_GET['id'];

$sql = mysqli_query($db,"DELETE FROM pegawai WHERE id='$id'");

if ($sql) {
	echo "<script>alert('Data Terhapus');
		history.go(-1)
	</script>";
}else {
	echo "<script>alert('Gagal Terhapus');
		history.go(-1)
	</script>";
}
?>