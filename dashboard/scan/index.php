
<!-- login session -->
<?php 
 require('../../configuration/dbcon.php');
 $username      = "ptsp";
 $login         = mysqli_query($db, "SELECT * FROM pegawai WHERE username='$username'");
 $datalogin     = mysqli_fetch_array($login);
 ?>  

<?php
 require'../../configuration/dbcon.php';
 $sql = mysqli_query($db, "SELECT * FROM aplikasi");
 $aplikasi = mysqli_fetch_array($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sistem Buku Tamu digital</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="../assets/logo/bd.png"/>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">  
        <h3>Sibudi</h3>
      </div>
    </nav>

    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="index.php?action=profil" class="nav-link">
              <div class="nav-profile-image">
                <img src="../assets/logo/admin.png" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2">Tamu</span>
                <span class="text-secondary text-small">online</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=bukutamu">
              <span class="menu-title">Buku Tamu</span>
              <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
            <?php 
                if(isset($_GET['action'])) {
                    $action = $_GET['action'];
                    switch ($action) {
                        case 'bukutamu':
                            include "bukutamu.php";
                            break;
                        case 'form':
                            include "formtamu.php";
                            break;
                        case 'detailtamu':
                            include "detail.php";
                            break;
                        case 'survey':
                            include "survey.php";
                            break;
                        default:
                        include "formtamu.php";
                        break;
                    }
                }
                else {
                    header("Location: ".$baseUrl."dashboard/scan/index.php?action=form");
                    die();
                }
            ?>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include '../assets/footer.php'; ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
  <script src="../assets/vendors/js/vendor.bundle.addons.js"></script>
  <script src="../assets/js/off-canvas.js"></script>
  <script src="../assets/js/misc.js"></script>
  <script src="../assets/js/dashboard.js"></script>

  <?php include '../assets/get.php'; ?>
  <script src="../transaksi/js/cari.js"></script>
  <!-- End custom js for this page-->
</body>

</html>