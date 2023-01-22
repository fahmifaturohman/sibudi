<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
	  			  
        <h3><?= $aplikasi['nama'] ?></h3>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <div class="search-field d-none d-md-block">
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">


              <div class="nav-profile-img">
                <img src="assets/logo/admin.png">
                <span class="availability-status online"></span>
				           
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black"><?= $datalogin['nama'] ?></p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="index.php?action=profil">
                <i class="mdi mdi-account mr-2 text-success"></i>
                Profil
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="logout.php">
                <i class="mdi mdi-logout mr-2 text-primary"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
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
                <img src="assets/logo/admin.png" alt="profile">
                <span class="login-status online"></span> <!--change to offline or busy as needed-->              
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><?= $datalogin['nama'] ?></span>
                <span class="text-secondary text-small">online</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=profil">
              <span class="menu-title">Profil Saya</span>
              <i class="mdi mdi-account menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=data">
              <span class="menu-title">Info Aplikasi</span>
              <i class="mdi mdi-settings menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=datatamu">
              <span class="menu-title">Tamu</span>
              <i class="mdi mdi-account-multiple menu-icon"></i>
            </a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link" href="index.php?action=laporan">
              <span class="menu-title">Laporan</span>
              <i class="mdi mdi-file-chart menu-icon"></i>
            </a>
          </li>

        </ul>
      </nav>