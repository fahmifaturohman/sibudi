<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-account-multiple"></i>                 
    </span>
    Laporan Tamu <?= $aplikasi['instansi'] ?>
  </h3>
  <nav aria-label="breadcrumb">
    <ul class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">
        <span></span>Overview
        <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
      </li>
    </ul>
  </nav>
</div>


<div class="row">
  <?php 
    $sql = mysqli_query($db,"SELECT * FROM tamu");
   ?>
  <div class="col-md-3 stretch-card grid-margin">
    <div class="card bg-gradient-warning card-img-holder text-white">
      <div class="card-body">
        <h4 class="font-weight-normal mb-3">Total Tamu
          <i class="mdi mdi-account-multiple mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5"><?= mysqli_num_rows($sql) ?> Tamu</h2>
      </div>
    </div>
  </div>

  <?php
    ini_set("display_errors","off");
    $bulan=date('m');
    $sql2=mysqli_query($db,"SELECT MONTH(tgl) bulan,  COUNT(id) jumlah FROM tamu WHERE YEAR(tgl) = YEAR(NOW()) GROUP BY MONTH(tgl) ORDER BY MONTH(tgl) ASC");
    $row=mysqli_fetch_assoc($sql2);
    $month=$row['data'];
  ?>
  <div class="col-md-3 stretch-card grid-margin">
    <div class="card bg-gradient-success card-img-holder text-white">
      <div class="card-body">
        <h4 class="font-weight-normal mb-3">Bulan Ini
          <i class="mdi mdi-account-multiple mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5"><?= $row['jumlah']; ?> Tamu</h2>
      </div>
    </div>
  </div>

  <?php
    ini_set("display_errors","off");
    $tgl = date('Y-m-d');
    $sql3=mysqli_query($db,"SELECT * FROM tamu WHERE tgl='$tgl'");
    while ($return=mysqli_fetch_array($sql3)){
    $today += $return['harga'];
    }
  ?>
  <div class="col-md-3 stretch-card grid-margin">
    <div class="card bg-gradient-primary card-img-holder text-white">
      <div class="card-body">
        <h4 class="font-weight-normal mb-3">Hari Ini
          <i class="mdi mdi-chart-line mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5"><?= mysqli_num_rows($sql3) ?> Tamu</h2>
      </div>
    </div>
  </div>

</div>

<div class="row">

  <div class="col-lg-3">
    <h4>Rekap Semua Data</h4>
    
    <a href="index.php?action=rekapall" class="btn btn-outline-primary btn-xs">Rekap Data</a>
      
  </div>

  <div class="col-lg-3">
    <h4>Rekap Data Per Bulan</h4>
    <form action="index.php?action=rekapbulan" method="post">
      <div class="form-group">
        <select name="bulan" class="form-control">
          <option>Pilih Bulan</option>
          <option value="01">Januari</option>
          <option value="02">Februari</option>
          <option value="03">Maret</option>
          <option value="04">April</option>
          <option value="05">Mei</option>
          <option value="06">Juni</option>
          <option value="07">Juli</option>
          <option value="08">Agustus</option>
          <option value="09">September</option>
          <option value="10">Oktober</option>
          <option value="11">November</option>
          <option value="12">Desember</option>
        </select>
      </div>
      
      <div class="form-group">
        <select name="tahun" class="form-control">
          <?php
          $mulai= date('Y') - 5;
          for($i = $mulai;$i<$mulai + 100;$i++){
              $sel = $i == date('Y') ? ' selected="selected"' : '';
              echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
          }
          ?>
        </select>
      </div>

      <button type="submit" class="btn btn-outline-primary btn-xs">Rekap Data</button>

    </form>
  </div>


  <div class="col-lg-3">
    <h4>Rekap Data Per Hari</h4>
    <form action="index.php?action=rekaphari" method="post">
      
      <div class="form-group">
        <input type="date" name="tgl" class="form-control" value="<?=date('Y-m-d')?>">
      </div>

      <button type="submit" class="btn btn-outline-primary btn-xs">Rekap Data</button>

    </form>
  </div>

</div>

</div>