<?php 

	require'../configuration/dbcon.php';
?>


<html>
<head>
	<title>Report Excel </title>
</head>

<body>


<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Tamu All.xls");
?>


<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-account-multiple"></i>                 
    </span>
    Rekap Seluruh Tamu
  </h3>
</div>

<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-body">
        <p class="card-description">
        </p>
        <div id="div1">
          <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>No Hp</th>
              <th>Jumlah Berkunjung</th>
            </tr>
          </thead>
          <?php 
            $no = 1;
            $sql = mysqli_query($db,"SELECT COUNT(nama) jumlah, nama, alamat, nohp FROM `tamu` GROUP BY nama ASC");
            while($tamu = mysqli_fetch_array($sql)){
          ?>
          <tbody>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $tamu['nama'] ?></td>
              <td><?= $tamu['alamat'] ?></td>
              <td><?= $tamu['nohp'] ?></td>
              <td><?= $tamu['jumlah'] ?> kali</td>
            </tr>
          <?php } ?>
          </tbody> 
        </table>
        </div>
        </div>
      </div>
    </div>
  </div>
</div></div>

</body>

</html>