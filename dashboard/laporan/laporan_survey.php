<?php 
 
  $tahun = $_POST['tahun'];
  $sql = mysqli_query($db,"select * from v_tamu where year(tgl) = '$tahun'");
  $view = mysqli_fetch_array($sql)
?>
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-credit-card-multiple"></i>                 
    </span>
    Rekap Survey <?= $tahun ?>
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
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <p class="card-description">
          <code>
            <a href="index.php?action=laporan" class="btn btn-outline-danger btn-xs"><< Kembali</a>
            <input type="button" class="btn btn-outline-primary btn-xs" onClick="printContent('div1')" value="Print Data">
          </code>
        </p>
        Tgl Cetak : <?= date('d-m-Y') ?>
        <div id="div1">
        <h3 class="text-center">Hasil Survey Online Tamu 
          <?= $aplikasi['instansi'] ?></h3>
        <hr>
        <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr  style="text-align: center;">
              <th rowspan="2" bgcolor="#00ff80"><b>Total Responden</b></th>
              <th colspan="3" bgcolor="#00ff80">Hasil survey</th>
            </tr>
             <tr style="text-align: center;">
              <th bgcolor="#00ff80">Sangat puas</th>
              <th bgcolor="#00ff80">Puas</th>
              <th bgcolor="#00ff80">Tidak puas</th>
            <!-- <th bgcolor="#00ff80"></th> -->
        </tr>
          </thead>
          <?php 
            $no = 1;
            // $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $tot=0;
            $puas=0;
            $tidak=0;
           $sql = mysqli_query($db,"select * from v_tamu where year(tgl) = '$tahun'");
            while($survey = mysqli_fetch_array($sql)){

              $sql8 = mysqli_query($db,"SELECT sum(sangat_puas) FROM survey");
              $sql9 = mysqli_query($db,"SELECT sum(puas) FROM survey");
              $sql10 = mysqli_query($db,"SELECT sum(tidak) FROM survey");

              $total = 0;
              $tot += $survey['sangat_puas'];
              $hasil1 = $tot/3;
              $puas += $survey['puas'];
              $hasil2 = $puas/2;  
              $tidak += $survey['tidak'];
              $hasil3 = $tidak/1;  
          ?>
          <tbody>
            

          <?php } ?>

          <tr style="text-align: center;">
            <td><b>
              <?= $hasil1 + $hasil2 + $hasil3; ?>
            </b></td>              
            <td><b><?= $hasil1; ?></b></td>
            <td><b><?= $hasil2; ?></b></td>
            <td><b><?= $hasil3; ?></b></td>
          </tr>
        </tbody>
      </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p>
        <h3 class="text-center">Detail Data Hasil Survey Online Tamu 
          <?= $aplikasi['instansi'] ?></h3>
        <table class="table table-hover">
          <thead>
            <tr  style="text-align: center;">
              <th rowspan="2" bgcolor="#00ff80">No</th>
              <th rowspan="2" bgcolor="#00ff80">Tanggal</th>
              <th colspan="3" bgcolor="#00ff80">Hasil survey</th>
            </tr>
            <tr style="text-align: center;">
              <th bgcolor="#00ff80">Sangat puas</th>
              <th bgcolor="#00ff80">Puas</th>
              <th bgcolor="#00ff80">Tidak puas</th>
              <!-- <th bgcolor="#00ff80"></th> -->
            </tr>
          </thead>
          <?php 
            $no = 1;
            // $bulan = $_POST['bulan'];
            $tahun = $_POST['tahun'];
            $tot=0;
            $puas=0;
            $tidak=0;
           $sql = mysqli_query($db,"select * from v_tamu where year(tgl) = '$tahun'");
            while($survey = mysqli_fetch_array($sql)){

              $sql8 = mysqli_query($db,"SELECT sum(sangat_puas) FROM survey");
              $sql9 = mysqli_query($db,"SELECT sum(puas) FROM survey");
              $sql10 = mysqli_query($db,"SELECT sum(tidak) FROM survey");

              $total = 0;
              $tot += $survey['sangat_puas'];
              $hasil1 = $tot/3;
              $puas += $survey['puas'];
              $hasil2 = $puas/2;  
              $tidak += $survey['tidak'];
              $hasil3 = $tidak/1;  
          ?>
          <tbody>
            <tr style="text-align: center;">
              <td><?= $no++ ?></td>
              <td><?= $survey['tgl'] ?></td>
              <td><?= $survey['sangat_puas'] ?></td>
              <td><?= $survey['puas'] ?></td>
              <td><?= $survey['tidak'] ?></td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
        <p>&nbsp;</p>
        </div>
        <h4>Total Seluruh Survey : <?= mysqli_num_rows($sql) ?></h4>
        
        </div>
      </div>
    </div>
  </div>
</div></div>
<script>
function printContent(el){
  var restorepage = document.body.innerHTML;
  var printcontent = document.getElementById(el).innerHTML;
  document.body.innerHTML = printcontent;
  window.print();
  document.body.innerHTML = restorepage;
}
</script>