<div class="row">
	<div class="col-lg-4">
		<h3 class="text-center">Profil <?= $datalogin['nama'] ?></h3>
		<hr>
		<from action="info/updateprofil.php" method="post" enctype="multipart/form-data">

			<div class="form-group">
				<label>Username</label>
				<input type="hidden" name="id" value="<?= $datalogin['id'] ?>" class="form-control">
				<input  disabled="disabled" type="text" name="username" value="<?= $datalogin['username'] ?>" class="form-control" maxlength="10">
			</div>

			<div class="form-group">
				<label>Password</label>
				<input disabled="disabled" type="password" name="password" value="<?= $datalogin['password'] ?>" class="form-control" maxlength="10">
			</div>

			<div class="form-group">
				<label>Nama</label>
				<input disabled="disabled" type="nama" name="nama" value="<?= $datalogin['nama'] ?>" class="form-control">
			</div>

		</from>
	</div>

</div>

</div>