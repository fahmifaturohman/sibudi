<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  $(function() {
    $("butdisable").click(function() {
      $("butdisable").attr("disabled","disabled");
      setTimeout(function(){
        $("#butdisable").removeAttr("disabled");

      },3000);

    });

  });
</script>

<div class="page-header">
  <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
      <i class="mdi mdi-account-multiple"></i>                 
    </span>
              Data Tamu <?= $aplikasi['instansi'] ?>
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
          <code><a href="index.php?action=addtamu" class="btn btn-outline-primary btn-sm">Tambah Tamu</a></code>
        </p>
        <div class="table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>No</th>
              <!-- <th>No Identitas</th> -->
              <!-- <th>Foto</th> -->
              <th>Nama Tamu</th>
              <!-- <th>Alamat</th>
              <th>Telp/WA</th> -->
              <th>Bertemu Dengan<br /> / Tgl</th>
              <th>Keperluan</th>
              <th>Rincian</th>
            <!--   <th>Tgl Berkunjung</th>
              <th>Jam Berkunjung</th> -->
              <th>Survei</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <?php
          $halaman = 10;
          $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
          $mulai = ($page > 1) ? ($page * $halaman) - $halaman : 0;
          // $result = mysqli_query($db, "SELECT * FROM tamu left join survey on()");
          $result = mysqli_query($db, "SELECT * FROM tamu");
          $total = mysqli_num_rows($result);
          $pages = ceil($total / $halaman);
          $query = mysqli_query($db, "SELECT a.*, b.* FROM `tamu` a LEFT JOIN survey b ON a.id = b.id_tamu order by a.tgl desc LIMIT $mulai, $halaman") or die(mysqli_error);
          $no = $mulai + 1;
          while ($tamu = mysqli_fetch_assoc($query)) {
         ?>
          <tbody>
            <tr>
              <td><?= $no++ ?></td>
              
				<!-- <td>
				<img src="<?= 'tamu/upload/' .$tamu['foto'] ?>" class="rounded-0" style="width:100%;max-width:250px;height:auto  "/> 
				</td> -->
              <td><?= $tamu['nama'] ?></td>
             <!--  <td><?= $tamu['alamat'] ?></td>
              <td><?= $tamu['nohp'] ?></td> -->
              <td><?= $tamu['bertemu'] ?><br />
                <?= date('d-m-Y', strtotime($tamu['tgl'])) ?></td>
              <td><?= $tamu['keperluan'] ?><br />
			  <?php if($tamu['keperluan']=="INFORMASI"){?><a href="tamu/cetak.php?id=<?= $tamu['id'] ?>" class="btn btn-outline-success btn-xs">Cetak</a> <?php } ?>
			  
			  </td>
              <td><?php if($tamu['keperluan']=="INFORMASI"){echo $tamu['rincian'];} else {echo $tamu['tindakan'];} ?></td>
           <!--    <td><?= $tamu['tgl'] ?></td>
              <td><?= $tamu['jam'] ?></td> -->
              
              <td>
                <!-- jika sudah mengisi survey, maka tidak bisa isi kembali -->
                <?php if($tamu['sangat_puas']==null && $tamu['puas']==null && $tamu['tidak']==null){ ?>
                <a href="index.php?action=survey&id=<?= $tamu['id']?>"class="btn btn-primary btn-xs">Isi survey</a>            
             <?php } else {
                if($tamu['sangat_puas'] > 0) { echo "<badge class='badge badge-success'>Sangat Puas</badge>"; }
                if($tamu['puas'] > 0) { echo "<badge class='badge badge-primary'>Puas</badge>"; }
                if($tamu['tidak'] > 0) { echo "<badge class='badge badge-danger'>Tidak Puas !</badge>"; }
             } ?>
                </td>
              <td>
               <a href="index.php?action=detailtamu&id=<?= $tamu['id'] ?>" class="btn btn-outline-warning btn-xs">Detail</a>
                <a href="index.php?action=edittamu&id=<?= $tamu['id']?>&keperluan=<?= $tamu['keperluan'] ?>" class="btn btn-outline-info btn-xs">Edit</a>
                <a href="index.php?action=hapustamu&id=<?= $tamu['id'] ?>" class="btn btn-outline-danger btn-xs">Delete</a>
              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
        </div>
        Halaman :<?php for ($i = 1; $i <= $pages; $i++) { ?>
          <a href="index.php?action=datatamu&halaman=<?= $i; ?>" class="btn btn-outline-primary btn-sm"><?= $i; ?></a>
          <?php } ?>
        <p class="card-description">Total Tamu : <?= mysqli_num_rows($query) ?> Orang</p>
      </div>
    </div>
  </div>
</div></div>

<!-- <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $('.button').bind('click', function(){
        alert('Anda mengklik button ' +$(this).text() + ' dan Tidak Bisa diklik Lagi');
        $('.button').unbind('click');
        });
      });
    </script>
 -->
<script>
  function removeLink() {
    document.getElementById("link").removeAttribute("href"); 
}
</script>