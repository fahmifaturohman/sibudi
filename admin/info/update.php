<?php 

require('../../configuration/dbcon.php');

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$level = $_POST['level'];

$update = mysqli_query($db,"UPDATE pegawai SET id='$id', username='$username', password='$password', nama='$nama',level='$level' WHERE id='$id'");

if ($update) {
    echo "<script> alert('data dirubah'); window.location='../index.php?action=user' </script>";
  }else{
    echo "<script> alert('Gagal!'); window.location='../index.php?action=user' </script>";
}
 ?>