<?php 
 require '../../configuration/dbcon.php';

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

/*
	$img         = $_POST['image'];
    $folderPath = "upload/";  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $fileName = uniqid() . '.png';
    $file = $folderPath . $fileName;
    file_put_contents($file, $image_base64);
*/
$fileName = NULL;
  
if($keperluan=="INFORMASI"){
	$cara		 = $_POST['cara'];
	$cara2	 	 = $_POST['cara2'];
	$chkCara="";  
	foreach($cara as $chk1){  
      $chkCara .= $chk1.",";  
	}
	$sql = mysqli_query($db,"INSERT INTO tamu ( `nama`, `alamat`,`pekerjaan`, `nohp`, `bertemu`, `keperluan`, email, rincian, tujuan, cara_mendapat_info, cara_memperoleh_info,`tindakan`, `tgl`, `jam`,  foto) VALUES('$nama','$alamat','$pekerjaan', '$nohp','$bertemu','$keperluan','$email','$rincian','$tujuan', '$chkCara', $cara2, '$tindakan','$tgl','$jam', '$fileName')");
  
}
else {
	$cara		 = ''	;
	$cara2	 	 = '';
$sql = mysqli_query($db,"INSERT INTO tamu ( `nama`, `alamat`,`pekerjaan`, `nohp`, `bertemu`, `keperluan`, `tindakan`, `tgl`, `jam`,  foto) VALUES('$nama','$alamat','$pekerjaan', '$nohp','$bertemu','$keperluan', '$tindakan','$tgl','$jam', '$fileName')");

}
	


if ($sql) {
	echo "<script>
		window.location='".$baseUrl."dashboard/scan/index.php?action=bukutamu'
	</script>";
}else {
	echo "<script>alert('Gagal Tersimpan'.$sql);
		window.location='".$baseIp."dashboard/scan/index.php?action=bukutamu'
	</script>";
}