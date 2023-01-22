<!-- jQuery -->
<script src='jquery-3.0.0.js' type='text/javascript'></script>

<!-- jSignature -->
<script src="/libs/jSignature.min.js"></script>
<script src="/libs/modernizr.js"></script>

<!--[if lt IE 9]>
<script type="text/javascript" src="/libs/flashcanvas.js"></script>
<![endif]-->

<!-- jSignature -->
<style>
#signature{
width: 100%;
height: auto;
border: 1px solid black;
}
</style>

<div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-account-multiple"></i>                 
              </span>
              Tambah Tamu <?= $aplikasi['instansi'] ?>
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
          <code><a href="index.php?action=datatamu" class="btn btn-outline-primary btn-sm">Data Tamu</a></code>
        </p>
        
       <form action="tamu/simpan.php" method="post" class="forms-sample">
          

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama Tamu</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" placeholder="ketik nama lengkap" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Alamat</label>
            <div class="col-sm-9">
              <textarea name="alamat" class="form-control" rows="3" placeholder="ketik alamat lengkap" required></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">No HP/WA</label>
            <div class="col-sm-9">
              <input type="number" name="nohp" class="form-control" placeholder="cth : 62812345678" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Bertemu Dengan</label>
            <div class="col-sm-9">
              <input type="text" name="bertemu" class="form-control" placeholder="cth : Pak Samsul" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Keperluan</label>
            <div class="col-sm-9">
              <input type="text" name="keperluan" class="form-control" placeholder="cth : Konsultasi" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tindakan</label>
            <div class="col-sm-9">
              <select name="tindakan" class="form-control" required>
                <option>Pilih Tindakan</option>
                <option>DIIZINKAN</option>
                <option>TIDAK DIIZINKAN</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tgl Berkunjung</label>
            <div class="col-sm-9">
              <input type="date" name="tgl" class="form-control" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Jam Berkunjung</label>
            <div class="col-sm-9">
              <input type="text" name="jam" value="<?php date_default_timezone_set("Asia/Jakarta"); ?><?= date('G:i:s') ?>" class="form-control" required>
            </div>
          </div>
                
			 <div class="form-group row">
            <label class="col-sm-3 col-form-label">foto</label>
            <div class="col-sm-9">
				
				<div>
    <video autoplay="true" id="video-webcam">
        Browsermu tidak mendukung bro, upgrade donk!
    </video>
</div>
<button onclick="takeSnapshot()">Ambil Gambar</button>
            </div>
          </div>
		  	
			<div class="form-group row">
            <label class="col-sm-3 col-form-label">Tanda Tangan</label>
			<div class="col-sm-9">
				<!-- Signature area -->
			<div id="signature">
			<br/>
			<br/>
			<br/>
			<br/>
			</div></div>
 

			
				
				
          <button type="submit" class="btn btn-gradient-danger btn-sm mr-2")">Simpan Data</button>

        </form>

      </div>
    </div>
  </div>
</div></div>


<!-- Script -->
<script>
$(document).ready(function() {

 // Initialize jSignature
 var $sigdiv = $("#signature").jSignature({'UndoButton':true});

 $('#click').click(function(){
  // Get response of type image
  var data = $sigdiv.jSignature('getData', 'image');

  // Storing in textarea
  $('#output').val(data);

  // Alter image source 
  $('#sign_prev').attr('src',"data:"+data);
  $('#sign_prev').show();
 });
});
</script>

<script type="text/javascript">
    // seleksi elemen video
    var video = document.querySelector("#video-webcam");

    // minta izin user
    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia || navigator.oGetUserMedia;

    // jika user memberikan izin
    if (navigator.getUserMedia) {
        // jalankan fungsi handleVideo, dan videoError jika izin ditolak
        navigator.getUserMedia({ video: true }, handleVideo, videoError);
    }

    // fungsi ini akan dieksekusi jika  izin telah diberikan
    function handleVideo(stream) {
        video.srcObject = stream;
    }

    // fungsi ini akan dieksekusi kalau user menolak izin
    function videoError(e) {
        // do something
        alert("Izinkan menggunakan webcam untuk demo!")
    }
</script>
function takeSnapshot() {
    // buat elemen img
    var img = document.createElement('img');
    var context;

    // ambil ukuran video
    var width = video.offsetWidth
            , height = video.offsetHeight;

    // buat elemen canvas
    canvas = document.createElement('canvas');
    canvas.width = width;
    canvas.height = height;

    // ambil gambar dari video dan masukan 
    // ke dalam canvas
    context = canvas.getContext('2d');
    context.drawImage(video, 0, 0, width, height);

    // render hasil dari canvas ke elemen img
    img.src = canvas.toDataURL('image/png');
    document.body.appendChild(img);
}
