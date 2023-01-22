<?php

require'../configuration/dbcon.php';
$id = $_GET['id'];
$sql = mysqli_query($db,"SELECT * FROM tamu WHERE id='$id'");
$edit = mysqli_fetch_array($sql);

?>

<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-account-multiple"></i>                 
    </span>
      Edit Tamu <?= $aplikasi['instansi'] ?>
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
  <div class="col-lg-10">
    <div class="card">
      <div class="card-body">
        <form action="tamu/update.php" method="post" class="forms-sample">
          <div class="form-group row">
              <input type="hidden" name="id" class="form-control" value="<?= $edit['id'] ?>" readonly>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama Tamu</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" value="<?= $edit['nama'] ?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <input type="text" name="alamat" class="form-control" value="<?= $edit['alamat'] ?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">HP/WA</label>
            <div class="col-sm-9">
              <input type="number" name="nohp" class="form-control" value="<?= $edit['nohp'] ?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Bertemu Dengan</label>
            <div class="col-sm-9">
              <input type="text" name="bertemu" class="form-control" value="<?= $edit['bertemu'] ?>">
            </div>
          </div>
          
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Keperluan</label>
            <div class="col-sm-9">
              <input type="text" name="keperluan" class="form-control" value="<?= $edit['keperluan'] ?>">
            </div>
          </div>


	<div class="form-group row">
            <label class="col-sm-3 col-form-label">Tindakan</label>
            <div class="col-sm-9">
              <select name="tindakan" class="form-control" required>
                <option><?= $edit['tindakan'] ?></option>
                <option>DIIZINKAN</option>
                <option>TIDAK DIIZINKAN</option>
              </select>
            </div>
          </div>
		  
		  
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tgl Berkunjung</label>
            <div class="col-sm-9">
              <input type="text" name="tgl" class="form-control" value="<?= $edit['tgl'] ?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Jam Berkunjung</label>
            <div class="col-sm-9">
              <input type="text" name="jam" class="form-control" value="<?= $edit['jam'] ?>">
            </div>
          </div>
          
          <a href="index.php?action=datatamu" class="btn btn-gradient-primary btn-sm"><< Kembali</a>      
          <button type="submit" class="btn btn-gradient-danger btn-sm mr-2">Edit Data</button>

        </form>

      </div>
    </div>
  </div>
</div></div>