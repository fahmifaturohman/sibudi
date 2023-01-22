<div class="row">
	<div class="col-lg-8">
		<h3 class="text-center">Data Aplikasi <?= $aplikasi['nama'] ?></h3>
		<hr>
		

			<div class="form-group">
				<label>Nama Aplikasi : </label>
				<strong><input disabled="disabled" value="<?= $aplikasi['nama'] ?>" class="form-control"></strong>
			</div>

			<div class="form-group">
				<label>Tagline</label>
				<input disabled="disabled" value="<?= $aplikasi['tagline'] ?>" class="form-control">
			</div>

			<div class="form-group">
				<label>Instansi/Lembaga</label>
				<input disabled="disabled" value="<?= $aplikasi['instansi'] ?>" class="form-control">
			</div>

			<div class="form-group">
				<label>No Hp</label>
				<input  disabled="disabled" value="<?= $aplikasi['nohp'] ?>" class="form-control">
			</div>


		</form>
	</div>

</div>

</div>