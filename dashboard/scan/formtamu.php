<!-- jQuery -->
<script src='jquery-3.0.0.js' type='text/javascript'></script>
<head>
    <title>Capture webcam image with php and jquery - ItSolutionStuff.com</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results { padding:20px; border:1px solid; background:#ccc; }
    </style>
</head>
<body>
<div class="page-header">
    <h3 class="page-title">
    <span class="page-title-icon bg-gradient-primary text-white mr-2">
    <i class="mdi mdi-account-multiple"></i>                 
    </span>
    Form Tambah Tamu <?= $aplikasi['instansi'] ?>
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
          <code><a href="index.php?action=bukutamu" class="btn btn-outline-primary btn-sm">Data Tamu</a></code>
        </p>
        
       <form action="../tamu/simpan_form.php" method="post" class="forms-sample">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama Tamu *</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" placeholder="ketik nama lengkap" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Alamat *</label>
            <div class="col-sm-9">
              <textarea name="alamat" class="form-control" rows="3" placeholder="ketik alamat lengkap" required></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">No HP/WA *</label>
            <div class="col-sm-9">
              <input type="number" name="nohp" class="form-control" placeholder="cth : 62812345678" required>
            </div>
          </div>

		      <div class="form-group row">
            <label class="col-sm-3 col-form-label">Pekerjaan *</label>
            <div class="col-sm-9">			
              <select class="form-control" id="pekerjaan" name = "pekerjaan" >
                  <option value="PNS MA" selected="PNS MA">PNS MA</option>
                  <option value="PNS NON MA">PNS NON MA</option>
                  <option value="MAHASISWA">MAHASISWA</option>	
                  <option value="PENGACARA">PENGACARA</option>
                  <option value="TNI/POLRI">TNI/POLRI</option>
                  <option value="SWASTA">SWASTA</option>
                  <option value="WIRASWASTA">WIRASWASTA</option>											
                  <option value="DOKTER">DOKTER</option>
                  <option value="LAINNYA">LAINNYA</option>			
              </select>														
            </div>
          </div>
		  
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Keperluan *</label>
            <div class="col-sm-9">			
			  <!--select class="form-control" id="keperluan" name = "keperluan" onChange="changeFunc();">
                <option value="INFORMASI">INFORMASI</option>
                <option value="SURAT KESEKRETARIATAN" selected="SURAT KESEKRETARIATAN">SURAT KESEKRETARIATAN	</option>
                <option value="SURAT KEPANITERAAN">SURAT KEPANITERAAN</option>
                <option value="PENGADUAN">PENGADUAN</option>	
                <option value="KUNJUNGAN">KUNJUNGAN</option>
                <option value="KONSULTASI">KONSULTASI</option>
              </select-->
              <textarea rows="3" cols="10" class="form-control" name = "keperluan"></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label id="lblBertemu" style="display: none" class="col-sm-3 col-form-label">Bertemu Dengan</label>
            <div class="col-sm-9">
              <input type="text" id="bertemu" name="bertemu" class="form-control" placeholder="cth : Pak Samsul" style="display: none">
            </div>
          </div>

          <div class="form-group row">
            <label id="lblEmail" style="display: none" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="text" id="email" name="email" class="form-control" placeholder="cth : ....@gmail.com" style="display: none">
            </div>
          </div>

          <div class="form-group row">
            <label id="lblRincian" style="display: none" class="col-sm-3 col-form-label">Rincian Informasi</label>
            <div class="col-sm-9">
              <input type="text" id="rincian" name="rincian" class="form-control" placeholder="informasi yg diminta" style="display: none">
            </div>
          </div>


          <div class="form-group row">
            <label id="lblTujuan" style="display: none" class="col-sm-3 col-form-label">Tujuan Penggunaan Informasi</label>
            <div class="col-sm-9">
              <input type="text" id="tujuan" name="tujuan" class="form-control" placeholder="cth : utk pribadi/instansi/lainnya" style="display: none">
            </div>
          </div>

          <div class="form-group row">
            <label id="lblCara" style="display: none" class="col-sm-3 col-form-label">Cara Memperoleh Informasi</label>
            <div class="col-sm-9">
              <input class="col-sm-2" type='checkbox' id="cara11" name="cara[]" class="form-control" style="display: none" value='1'>
			        <label class="col-sm-8" id="lblCara11" style="display: none" >Melihat/membaca/mendengarkan </label> 
              <input class="col-sm-2" type='checkbox' id="cara12" name="cara[]" class="form-control" style="display: none" value='2'>
			        <label class="col-sm-8" id="lblCara12" style="display: none" >Mendapatkan salinan informasi (Softcopy/hardcopy)</label>
            </div>
          </div>
		  
			    <div class="form-group row">
            <label id="lblCara2" style="display: none" class="col-sm-3 col-form-label">Cara Memperoleh Informasi</label>
            <div class="col-sm-9">
              <input class="col-sm-2" type='radio' id="cara21" name="cara2" class="form-control" value='1' style="display: none" >
			        <label class="col-sm-8" id="lblCara21" style="display: none" >Mengambil Langsung</label>
              <input class="col-sm-2"  type='radio' id="cara22" name="cara2" class="form-control" value='2' style="display: none" >
			        <label class="col-sm-8" id="lblCara22" style="display: none" >Email</label>
              <input class="col-sm-2" type='radio' id="cara23" name="cara2" class="form-control" value='3' style="display: none" >
			        <label class="col-sm-8" id="lblCara23" style="display: none" >Telepon</label>
            </div>
          </div>

          <div class="form-group row">
            <label id="lblTindakan" class="col-sm-3 col-form-label" style="display: none">Tindakan</label>
            <div class="col-sm-9">
              <select id="tindakan" name="tindakan" class="form-control" style="display: none">
                <option>Pilih Tindakan</option>
                <option>DIIZINKAN</option>
                <option>TIDAK DIIZINKAN</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tgl Berkunjung</label>
            <div class="col-sm-9">
              <input type="date" name="tgl" value="<?php echo date("Y-m-d");?>" class="form-control" required>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Jam Berkunjung</label>
            <div class="col-sm-9">
              <input type="text" name="jam" value="<?php date_default_timezone_set("Asia/Jakarta"); ?><?= date('G:i:s') ?>" class="form-control" required>
            </div>
          </div>
                
			    <!-- <div class="form-group row">
              <div class="col-md-6">
                  <div id="my_camera"></div>
                  <br/>
                  <input type=button value="Take Snapshot" onClick="take_snapshot()">
                  <input type="hidden" name="image" class="image-tag">
              </div>
            <div class="col-md-6">
                <div id="results">Your captured image will appear here...</div>
            </div>
            <div class="col-md-12 text-center">
                <br/>
            </div>
          </div>  	 -->
          <button type="submit" style="display: block" name = "btn_simpan" id = "btn_simpan" class="btn btn-gradient-danger btn-sm mr-2">Simpan Data</button>
        </form>
</body>
      </div>
    </div>
  </div>
</div></div>


<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    /*
    Webcam.set({
        width: 300,
        height: 230,
		dest_width: 300,
		dest_height: 230,
		image_format: 'jpeg',
		jpeg_quality: 90,
		force_flash: false
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
		
		$('#btn_simpan').show();
    }
    */


function changeFunc() {
var selectBox = document.getElementById("keperluan");
var selectedValue = selectBox.options[selectBox.selectedIndex].value;

if (selectedValue=="BERTAMU"){
$('#lblBertemu').show();
$('#bertemu').show();
document.getElementById('lblBertemu').innerHTML = "Bertemu Dengan";

$('#lblTindakan').show();
$('#tindakan').show();

$('#lblEmail').hide();
$('#email').hide();

$('#lblRincian').hide();
$('#rincian').hide();

$('#lblTujuan').hide();
$('#tujuan').hide();

$('#lblCara').hide();
$('#cara11').hide();
$('#cara12').hide();
$('#lblCara11').hide();
$('#lblCara12').hide();

$('#lblCara2').hide();
$('#cara21').hide();
$('#cara22').hide();
$('#cara23').hide();
$('#lblCara21').hide();
$('#lblCara22').hide();
$('#lblCara23').hide();
}
else if (selectedValue=="INFORMASI"){
$('#lblBertemu').show();
$('#bertemu').show();
document.getElementById('lblBertemu').innerHTML = "Petugas Informasi";

$('#lblTindakan').hide();
$('#tindakan').hide();

$('#lblEmail').show();
$('#email').show();

$('#lblRincian').show();
$('#rincian').show();

$('#lblTujuan').show();
$('#tujuan').show();

$('#lblCara').show();
$('#cara11').show();
$('#cara12').show();
$('#lblCara11').show();
$('#lblCara12').show();

$('#lblCara2').show();
$('#cara21').show();
$('#cara22').show();
$('#cara23').show();
$('#lblCara21').show();
$('#lblCara22').show();
$('#lblCara23').show();

}

else if (selectedValue=="PENGADUAN"){
$('#lblBertemu').show();
$('#bertemu').show();
document.getElementById('lblBertemu').innerHTML = "Petugas Pengaduan";

$('#lblTindakan').hide();
$('#tindakan').hide();

$('#lblEmail').hide();
$('#email').hide();

$('#lblRincian').hide();
$('#rincian').hide();

$('#lblTujuan').hide();
$('#tujuan').hide();

$('#lblCara').hide();
$('#cara11').hide();
$('#cara12').hide();
$('#lblCara11').hide();
$('#lblCara12').hide();

$('#lblCara2').hide();
$('#cara21').hide();
$('#cara22').hide();
$('#cara23').hide();
$('#lblCara21').hide();
$('#lblCara22').hide();
$('#lblCara23').hide();
}

else {
$('#lblBertemu').hide();
$('#bertemu').hide();

$('#lblTindakan').hide();
$('#tindakan').hide();

$('#textboxes').hide();
$('#lblEmail').hide();
$('#email').hide();

$('#lblRincian').hide();
$('#rincian').hide();

$('#lblTujuan').hide();
$('#tujuan').hide();

$('#lblCara').hide();
$('#cara11').hide();
$('#cara12').hide();
$('#lblCara11').hide();
$('#lblCara12').hide();

$('#lblCara2').hide();
$('#cara21').hide();
$('#cara22').hide();
$('#cara23').hide();
$('#lblCara21').hide();
$('#lblCara22').hide();
$('#lblCara23').hide();
}
}
</script>