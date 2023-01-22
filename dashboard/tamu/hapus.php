<?php 


require'../configuration/dbcon.php';
$id = $_GET['id'];
$sql1 = mysqli_query($db, "DELETE FROM survey WHERE id_tamu = '$id'");
$sql = mysqli_query($db,"DELETE FROM tamu WHERE id='$id'");

if ($sql) {
	echo "<script>alert('Data Terhapus');
			
	</script>";?>
	<p class="card-description">
          <code><a href="index.php?action=datatamu" class="btn btn-outline-primary btn-sm"><< Kembali</a></code>
        </p><?php
		
}else {
	echo "<script>alert('Gagal Terhapus');
		window.location='../index.php?action=datatamu'
	</script>";
}
?>