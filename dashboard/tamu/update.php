<?php

require '../../configuration/dbcon.php';

$id	 	 = $_POST['id'];
$nama	 	 = $_POST['nama'];
$alamat	 	 = $_POST['alamat'];
$pekerjaan 	 = $_POST['pekerjaan'];
$nohp	 	 = $_POST['nohp'];
$bertemu	 = $_POST['bertemu'];
$keperluan	 = $_POST['keperluan'];
$tindakan	 = $_POST['tindakan'];
$tgl	 	 = $_POST['tgl'];
$jam	 	 = $_POST['jam'];

$email       = $_POST['email'];
$rincian	 = $_POST['rincian'];
$tujuan	 	 = $_POST['tujuan'];


if($keperluan=="INFORMASI"){
	$cara		 = $_POST['cara'];
	$cara2	 	 = $_POST['cara2'];
	$chkCara="";  
	foreach($cara as $chk1){  
      $chkCara .= $chk1.",";  
	}
	
$sql = mysqli_query($db,"UPDATE tamu SET nama='$nama', pekerjaan='$pekerjaan', alamat='$alamat', nohp='$nohp', email='$email', rincian='$rincian', bertemu='$bertemu', tujuan='$tujuan', cara_mendapat_info='$chkCara',cara_memperoleh_info='$cara2', keperluan='$keperluan',tindakan='$tindakan',tgl='$tgl',jam='$jam' WHERE id='$id'");
}
else {

$sql = mysqli_query($db,"UPDATE tamu SET nama='$nama', alamat='$alamat', nohp='$nohp', bertemu='$bertemu', keperluan='$keperluan', tindakan='$tindakan', tgl='$tgl', jam='$jam' WHERE id='$id'");
	
}

if ($sql) {
	echo "<script>alert('data tamu $nama berhasil diubah');
		window.location='../index.php?action=datatamu'
	</script>";
}else {
	echo "<script>alert('Gagal');
		window.location='../index.php?action=datatamu'
	</script>";
}
