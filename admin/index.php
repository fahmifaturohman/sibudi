<?php
session_start();
if (!isset($_SESSION['username'])) {
  echo "<script> alert('silahkan login!!');
  window.location='../index.php?alert=danger' </script>";
} else {
  ?>

<!-- login session -->
<?php 
 require('../configuration/dbcon.php');
 $username      = $_SESSION['username'];
 $login         = mysqli_query($db, "SELECT * FROM pegawai WHERE username='$username'");
 $datalogin     = mysqli_fetch_array($login);
 ?>  

<?php
 require'../configuration/dbcon.php';
 $sql = mysqli_query($db, "SELECT * FROM aplikasi");
 $aplikasi = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include'assets/head.php'; ?>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include 'assets/navbar.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          
          <?php 
            if(isset($_GET['action'])){
              $action = $_GET['action'];
          
              switch ($action) {

                // profil / data
                case 'data':
                include "info/data.php";
                break;

                case 'profil':
                include "info/profil.php";
                break;

                case 'user':
                include "info/user.php";
                break;

                case 'editpegawai':
                include "info/edit.php";
                break;
                
                case 'hapuspegawai':
                include "info/hapus.php";
                break;

                case 'addpegawai':
                include "info/tambah.php";
                break;
                
                // laporan
                case 'laporan':
                include "laporan/home.php";
                break;

                case 'rekaphari':
                include "laporan/hari.php";
                break;

                case 'rekapbulan':
                include "laporan/bulan.php";
                break;

                case 'rekaptahun':
                include "laporan/tahun.php";
                break;

                case 'rekapall':
                include "laporan/all.php";
                break;

                // laporan survey
                case 'lapsurvey':
                include "lapsurvey/lapsurvey.php";
                break;

                //survey
                case 'survey':
                include "survey/survey.php";
                break;

                
                
                default:
                echo "<center><h3>Maaf. Halaman tidak di temukan !</h3></center>";
                break;
                }
                }else{
                  include "home.php";
                }
          
             ?>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include 'assets/footer.php'; ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <?php include 'assets/js.php'; ?>
  <?php include'assets/get.php'; ?>
  <script src="transaksi/js/cari.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
<?php } ?>