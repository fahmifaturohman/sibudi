<?php 
  $tahun = $_POST['tahun'];
  $sql = mysqli_query($db,"select * from transaksi where year(tgl) = '$tahun'");
  $view = mysqli_fetch_array($sql)
?>
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-credit-card-multiple"></i>                 
    </span>
    Rekap Transaksi Tahun : <?= $tahun ?>
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
            <input type="button" class="btn btn-outline-primary btn-xs" onClick="printContent('div1')" value="Print Data">
          </code>
        </p>
        <div id="div1">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>No Nota</th>
              <th>Nama Pelanggan</th>
              <th>Paket</th>
              <th>Harga</th>
              <th>Tanggal Nota</th>
            </tr>
          </thead>
          <?php 
            $no = 1;
            $tahun = $_POST['tahun'];
            $sql = mysqli_query($db,"select * from transaksi where year(tgl) = '$tahun'");
            while($transaksi = mysqli_fetch_array($sql)){
          ?>
          <tbody>
            <tr>
              <td><?= $no++ ?></td>
              <td class="text-danger"><?= $transaksi['idnota'] ?></td>
              <td><?= $transaksi['namapelanggan'] ?></td>
              <td><?= $transaksi['paket'] ?></td>
              <td>Rp <?= number_format($transaksi['harga'],0,",",".");?></td>
              <td><?= $transaksi['tgl'] ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        <?php
          ini_set("display_errors","off");
          $tahuns=$_POST['tahun'];
          $sql4=mysqli_query($db,"SELECT SUM(harga) AS data FROM transaksi WHERE idnota IN (SELECT idnota FROM transaksi) AND tgl LIKE '%$tahuns%'");
          $rows=mysqli_fetch_array($sql4);
          $year=$rows['data'];
        ?>

        <h4>Total Pendapatan Tahun <?= $tahuns ?> : Rp <?= number_format($year,0,",",".");?></h4>
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