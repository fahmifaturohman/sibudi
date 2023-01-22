<div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-account-key"></i>                 
              </span>
              Tambah Admin & Pegawai <?= $aplikasi['instansi'] ?>
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
        <p class="card-description">
          <code><a href="index.php?action=user" class="btn btn-outline-primary btn-sm">Data Admin & Pegawai</a></code>
        </p>
        
       <form action="info/simpan.php" method="post" class="forms-sample">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Username</label>
            <div class="col-sm-9">
              <input type="text" name="username" class="form-control" placeholder="ketik username" maxlength="8" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Password</label>
            <div class="col-sm-9">
              <input type="password" name="password" class="form-control" placeholder="ketik password" maxlength="8" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama Lengkap</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" placeholder="ketik nama lengkap" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Jabatan/Level</label>
            <div class="col-sm-9">
              <select name="level" class="form-control" required>
                <option>Pilih Jabatan</option>
                <option>admin</option>
                <option>pegawai</option>
              </select>
            </div>
          </div>
                
          <button type="submit" class="btn btn-gradient-danger btn-sm mr-2">Simpan Data</button>

        </form>

      </div>
    </div>
  </div>
</div></div>