<?php

require'../configuration/dbcon.php';
$id = $_GET['id'];
$sql = mysqli_query($db,"SELECT * FROM tamu WHERE id='$id'");
$detail = mysqli_fetch_array($sql);

?>
<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-account-multiple"></i>    </span>
              Detail Tamu 
              <?= $aplikasi['instansi'] ?>
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
        <p class="card-description">Info Tamu : <?= $detail['nama'] ?></p>
        <table class="table table-hover">
          <thead>
            <tr>
              <td rowspan="9"><img src="<?= 'tamu/upload/' .$detail['foto'] ?>" class="rounded-0" style="width:100%;max-width:250px;height:auto  "/> </td>
              <td>Nama Lengkap</td>
               <td>:</td>
              <td><?= $detail['nama'] ?></td>
            </tr>
            <tr>
              
              <td>Alamat</td>
              <td>:</td>
              <td><?= $detail['alamat'] ?></td>
            </tr>
            <tr>
              
			  <td>Pekerjaan</td>
              <td>:</td>
              <td><?= $detail['pekerjaan'] ?></td>
            </tr>
            <tr>
              
			  
              <td>HP/WA</td>
              <td>:</td>
              <td><?= $detail['nohp'] ?></td>
            </tr>
            <tr>
              
              <td>Bertemu Dengan</td>
              <td>:</td>
              <td><?= $detail['bertemu'] ?></td>
            </tr>
            <tr>
              
              <td>Keperluan</td>
              <td>:</td>
              <td><?= $detail['keperluan'] ?></td>
            </tr>
            <tr>
           
			<?php if ($detail['keperluan']=="BERTAMU"){?>
              <td>Tindakan</td>
              <td>:</td>
              <td><?= $detail['tindakan'];?></td>
            </tr><?php } 
			else if($detail['keperluan']=="INFORMASI"){?>
              <td>Rincian</td>
              <td>:</td>
              <td><?= $detail['rincian'] ?></td>
            </tr>
			<?php } ?>
			
            <tr>
              <td>Tgl Berkunjung</td>
              <td>:</td>
              <td><?= $detail['tgl'] ?></td>
            </tr>
            <tr>
              <td>Jam Berkunjung</td>
              <td>:</td>
              <td><?= $detail['jam'] ?></td>
            </tr>
          </thead>  
        </table>
        <p class="card-description">
          <code><a href="index.php?action=datatamu" class="btn btn-outline-primary btn-sm"><< Kembali</a></code>
        </p>
      </div>
    </div>
  </div>
</div></div>