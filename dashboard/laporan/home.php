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
	  $sql2=mysqli_query($db,"SELECT COUNT(id) jumlah FROM tamu WHERE YEAR(tgl) = YEAR(NOW())");
	  $row=mysqli_fetch_assoc($sql2);
	?>
	<div class="col-md-3 stretch-card grid-margin">
	  <div class="card bg-gradient-info card-img-holder text-white">
		<div class="card-body">                 
		  <h4 class="font-weight-normal mb-3">Tamu Bulan Ini
			<i class="mdi mdi-account-multiple mdi-24px float-right"></i>
		  </h4>
		  <h2 class="mb-5"><?= $row['jumlah']; ?> Tamu</h2>
		</div>
	  </div>
	</div>

  <?php
	 $sql4=mysqli_query($db,"SELECT COUNT(id) jumlah FROM tamu WHERE date(tgl) = date(NOW())");
	$hari = mysqli_fetch_assoc($sql4);
	?>
	<div class="col-md-3 stretch-card grid-margin">
	  <div class="card bg-gradient-success card-img-holder text-white">
		<div class="card-body">                                  
		  <h4 class="font-weight-normal mb-3">Tamu Hari Ini
			<i class="mdi mdi-account-multiple mdi-24px float-right"></i>
		  </h4>
		  <h2 class="mb-5"><?=$hari['jumlah'];?> Tamu</h2>
      </div>
    </div>
  </div>

  <?php
      $sql5 = mysqli_query($db,"SELECT * FROM survey");
    ?>
  <div class="col-md-3 stretch-card grid-margin">
    <div class="card bg-danger card-img-holder text-white">
      <div class="card-body">
        <h4 class="font-weight-normal mb-3">Total survey
          <i class="mdi mdi-account-multiple mdi-24px float-right"></i>
        </h4>
        <h2 class="mb-5"><?= mysqli_num_rows($sql5) ?> Survey</h2>
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
        <?php $mymonth = date('m');?>
        <select name="bulan" class="form-control">
          <option>Pilih Bulan</option>
          <option value="01" <?=($mymonth == "01") ? 'selected':''?>>Januari</option>
          <option value="02" <?=($mymonth == "02") ? 'selected':''?>>Februari</option>
          <option value="03" <?=($mymonth == "03") ? 'selected':''?>>Maret</option>
          <option value="04" <?=($mymonth == "04") ? 'selected':''?>>April</option>
          <option value="05" <?=($mymonth == "05") ? 'selected':''?>>Mei</option>s
          <option value="06" <?=($mymonth == "06") ? 'selected':''?>>Juni</option>
          <option value="07" <?=($mymonth == "07") ? 'selected':''?>>Juli</option>
          <option value="08" <?=($mymonth == "08") ? 'selected':''?>>Agustus</option>
          <option value="09" <?=($mymonth == "09") ? 'selected':''?>>September</option>
          <option value="10" <?=($mymonth == "10") ? 'selected':''?>>Oktober</option>
          <option value="11" <?=($mymonth == "11") ? 'selected':''?>>November</option>
          <option value="12" <?=($mymonth == "12") ? 'selected':''?>>Desember</option>
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

   <div class="col-lg-3">
    
    <h4>Total survey pertahun</h4>
    <form action="index.php?action=laporan_survey" method="post">
        
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

      <button type="submit" class="btn btn-outline-primary btn-xs">Rekap Survey</button>

    </form>
  </div>
</div>

</div>