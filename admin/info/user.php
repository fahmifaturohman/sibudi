<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-account-multiple"></i>                 
    </span>
              Data Admin dan Pegawai <?= $aplikasi['instansi'] ?>
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
          <code><a href="index.php?action=addpegawai" class="btn btn-outline-primary btn-sm">Tambah Admin / Pegawai</a></code>
        </p>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <th>Nama Pegawai</th>
              <th>Username</th>
              <th>Password</th>
              <th>Jabatan</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <?php
          $halaman = 10;
          $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
          $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
          $result = mysqli_query($db, "SELECT * FROM pegawai");
          $total = mysqli_num_rows($result);
          $pages = ceil($total / $halaman);
          $query = mysqli_query($db, "SELECT * FROM pegawai LIMIT $mulai, $halaman") or die(mysqli_error);
          $no = $mulai + 1;
          while ($pegawai = mysqli_fetch_assoc($query)) {
         ?>
          <tbody>
            <tr>
              <td><?= $no++ ?></td>
              <td><?= $pegawai['nama'] ?></td>
              <td><?= $pegawai['username'] ?></td>
              <td><?= $pegawai['password'] ?></td>
              <td><?= $pegawai['level'] ?></td>
              <td>
                <a href="index.php?action=editpegawai&id=<?= $pegawai['id'] ?>" class="btn btn-outline-info btn-xs">edit</a>
                <a href="index.php?action=hapuspegawai&id=<?= $pegawai['id'] ?>" class="btn btn-outline-danger btn-xs">delete</a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        Halaman :<?php for ($i = 1; $i <= $pages; $i++) { ?>
          <a href="index.php?action=datatransaksi&halaman=<?= $i; ?>" class="btn btn-outline-primary btn-sm"><?= $i; ?></a>
          <?php } ?>
        <p class="card-description">Total Admin & Pegawai : <?= mysqli_num_rows($query) ?> Orang</p>
      </div>
    </div>
  </div>
</div></div>