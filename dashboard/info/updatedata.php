<?php 

require('../../configuration/dbcon.php');

$id = $_POST['id'];
$nama = $_POST['nama'];
$tagline = $_POST['tagline'];
$instansi = $_POST['instansi'];
$nohp = $_POST['nohp'];

$update = mysqli_query($db,"UPDATE aplikasi SET id='$id', nama='$nama', tagline='$tagline', instansi='$instansi',nohp='$nohp' WHERE id='$id'");

if ($update) {
    echo "<script> alert('data dirubah'); window.location='../index.php?action=data' </script>";
  }else{
    echo "<script> alert('Gagal!'); window.location='../index.php?action=data' </script>";
}
 ?>