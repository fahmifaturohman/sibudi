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
            <label class="col-sm-3 col-form-label">Keperluan *</label>
            <div class="col-sm-9">
			
			<select class="form-control" name = "keperluan">
                                                           <option value="INFORMASI">INFORMASI</option>
                                                           <option value="SURAT KESEKRETARIATAN" selected="SURAT KESEKRETARIATAN">
														   SURAT KESEKRETARIATAN	</option>
                                                           <option value="SURAT KEPANITERAAN">SURAT KEPANITERAAN</option>
                                                           <option value="PENGADUAN">PENGADUAN</option>	
														   <option value="BERTAMU">BERTAMU</option>														
															</select>														
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Bertemu Dengan</label>
            <div class="col-sm-9">
              <input type="text" name="bertemu" class="form-control" placeholder="cth : Pak Samsul" required>
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
        </div>
		  	

			
				
				
          <button type="submit" class="btn btn-gradient-danger btn-sm mr-2">Simpan Data</button>

        </form>
</body>
      </div>
    </div>
  </div>
</div></div>


<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>