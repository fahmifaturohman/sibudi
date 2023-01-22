<?php

require'../configuration/dbcon.php';

$sql = mysqli_query($db,"SELECT * FROM aplikasi limit 1");
$aplikasi = mysqli_fetch_array($sql);

?>
<form action="info/updatedata.php" method="post" class="forms-sample">
<div class="row">
	<div class="col-lg-4">
		<h3 class="text-center">Data <?= $aplikasi['nama'] ?></h3>
		<hr>


			<div class="form-group">
				<label>Nama</label>
				<input type="hidden" name="id" value="<?= $aplikasi['id'] ?>" class="form-control">
				<input type="text" name="nama" value="<?= $aplikasi['nama'] ?>" class="form-control">
			</div>

			<div class="form-group">
				<label>Tagline</label>
				<input type="text" name="tagline" value="<?= $aplikasi['tagline'] ?>" class="form-control">
			</div>

			<div class="form-group">
				<label>Instansi/Lembaga</label>
				<input type="text" name="instansi" value="<?= $aplikasi['instansi'] ?>" class="form-control">
			</div>

			<div class="form-group">
				<label>No Hp</label>
				<input type="text" name="nohp" value="<?= $aplikasi['nohp'] ?>" class="form-control">
			</div>

			<div class="form-group">
				<label for="">Alamat</label>
				<textarea class="form-control" name="alamat" cols="10" rows="3"><?=$aplikasi['alamat'] ?></textarea>
			</div>

			  <button type="submit" class="btn btn-gradient-danger btn-sm mr-2">Edit Data</button>


		</from>
	</div>

</div>

</div>