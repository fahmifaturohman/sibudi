<?php 
 
    $tgl = $_POST['tgl'];
  
?>
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-account-multiple"></i>                 
    </span>
    Rekap Tamu <?= $tgl ?>
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
        <div id="div1">
        <h3 class="text-center">Data Tamu <?= $aplikasi['instansi'] ?></h3><hr>
        <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>No Hp</th>
              <th>Keperluan</th>
              <th>Tindakan</th>
              <th>Tgl</th>
              <th>Jam</th>
            </tr>
          </thead>
          <?php 
            $no = 1;
 
            if(isset($_POST['tgl'])){
              $tgl = $_POST['tgl'];
              $sql = mysqli_query($db,"select * from tamu where tgl='$tgl'");
            }else{
              $sql = mysqli_query($db,"select * from tamu");
            }
            while($tamu = mysqli_fetch_array($sql)){
          ?>
          <tbody>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $tamu['nama'] ?></td>
              <td><?= $tamu['alamat'] ?></td>
              <td><?= $tamu['nohp'] ?></td>
              <td><?= $tamu['keperluan'] ?></td>
              <td><?= $tamu['tindakan'] ?></td>
              <td><?= $tamu['tgl'] ?></td>
              <td><?= $tamu['jam'] ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        </div>
        <h4>Total Seluruh Tamu : <?= mysqli_num_rows($sql) ?></h4>
        Tgl Cetak : <?= date('d-m-Y') ?>
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