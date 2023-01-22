<?php

require'../configuration/dbcon.php';
$id = $_GET['id'];
$sql = mysqli_query($db,"SELECT * FROM pegawai WHERE id='$id'");
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
        <form action="info/update.php" method="post" class="forms-sample">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">ID</label>
            <div class="col-sm-9">
              <input type="text" name="id" class="form-control" value="<?= $edit['id'] ?>" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama Pegawai</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" value="<?= $edit['nama'] ?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
              <input type="text" name="username" class="form-control" value="<?= $edit['username'] ?>" maxlength="8">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" name="password" class="form-control" value="<?= $edit['password'] ?>" maxlength="8">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Jabatan/Level</label>
            <div class="col-sm-9">
                <select name="level" class="form-control">
                    <?php 
                        $arr = ["admin", "pegawai"];
                        foreach($arr as $key) {
                            $selected = ($edit['level'] == $key) ? "selected":"";
                            echo '<option value="'.$key.'" '.$selected.'>'.$key.'</option>';
                        }
                    ?>
                </select>
              <!--<input type="text" name="level" class="form-control" value="<?= $edit['level'] ?>">-->
            </div>
          </div>
          
          
          <a href="index.php?action=user" class="btn btn-gradient-primary btn-sm">Kembali</a>      
          <button type="submit" class="btn btn-gradient-danger btn-sm mr-2">Edit Data</button>

        </form>

      </div>
    </div>
  </div>
</div></div>