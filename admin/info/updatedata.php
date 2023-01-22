<?php 

require('../../configuration/dbcon.php');

$id = $_POST['id'];
$nama = $_POST['nama'];
$tagline = $_POST['tagline'];
$instansi = $_POST['instansi'];
$nohp = $_POST['nohp'];
$alamat = $_POST['alamat'];

$update = mysqli_query($db,"UPDATE aplikasi SET id='$id', nama='$nama', tagline='$tagline', instansi='$instansi',nohp='$nohp', alamat = '$alamat' WHERE id='$id'");

if ($update) {
    echo "<script> alert('data berhasil diubah'); window.location='../index.php?action=data' </script>";
  }else{
    echo "<script> alert('Gagal!'); window.location='../index.php?action=data' </script>";
}

 ?>