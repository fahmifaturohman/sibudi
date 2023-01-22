<?php

require'../configuration/dbcon.php';
$id = $_GET['id'];
$keperluan= $_GET['keperluan'];
$sql = mysqli_query($db,"SELECT * FROM tamu WHERE id='$id'");
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
        <form action="tamu/update.php" method="post" class="forms-sample">
          <div class="form-group row">
              <input type="hidden" name="id" class="form-control" value="<?= $edit['id'] ?>" readonly>
          </div>
			<div align="right"><img src="<?= 'tamu/upload/' .$edit['foto'] ?>" class="rounded-0" style="width:100%;max-width:250px;height:auto  "/> 

			  
		  </div>
			<div class="form-group row">
            <label class="col-sm-3 col-form-label">Nama Tamu*</label>
            <div class="col-sm-9">
              <input type="text" name="nama" class="form-control" value="<?= $edit['nama'] ?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Alamat*</label>
            <div class="col-sm-9">
              <input type="text" name="alamat" class="form-control" value="<?= $edit['alamat'] ?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">HP/WA*</label>
            <div class="col-sm-9">
              <input type="number" name="nohp" class="form-control" value="<?= $edit['nohp'] ?>">
            </div>
          </div>
		  
		  <div class="form-group row">
            <label class="col-sm-3 col-form-label">Pekerjaan *</label>
            <div class="col-sm-9">
			
			<select class="form-control" id="pekerjaan" name = "pekerjaan" >
                                                           <option value="<?= $edit['pekerjaan'] ?>" selected="<?= $edit['pekerjaan'] ?>">
														   <?= $edit['pekerjaan'] ?></option>
														   <option value="PNS MA">PNS MA</option>
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
			
			<select class="form-control" id="keperluan" name = "keperluan" onchange="changeFunc();">
														   <option value="<?= $edit['keperluan'] ?>" selected="<?= $edit['keperluan'] ?>">
														   <?= $edit['keperluan'] ?></option>
                                                           <option value="INFORMASI">INFORMASI</option>
                                                           <option value="SURAT KESEKRETARIATAN">SURAT KESEKRETARIATAN	</option>
                                                           <option value="SURAT KEPANITERAAN">SURAT KEPANITERAAN</option>
                                                           <option value="PENGADUAN">PENGADUAN</option>	
														   <option value="BERTAMU">BERTAMU</option>														
			  </select>														
            </div>
          </div>
		  
		   <div class="form-group row">
            <label class="col-sm-3 col-form-label">Tgl Berkunjung</label>
            <div class="col-sm-9">
              <input type="text" name="tgl" class="form-control" value="<?= $edit['tgl'] ?>">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Jam Berkunjung</label>
            <div class="col-sm-9">
              <input type="text" name="jam" class="form-control" value="<?= $edit['jam'] ?>">
            </div>
          </div>
		  
			<?php if($edit['keperluan']=="BERTAMU" || $edit['keperluan']=="INFORMASI" || $edit['keperluan']=="PENGADUAN" ){?>
          <div class="form-group row">
            <label id="lblBertemu" class="col-sm-3 col-form-label">Bertemu Dengan</label>
            <div class="col-sm-9">
              <input type="text" id="bertemu" name="bertemu" class="form-control" value="<?= $edit['bertemu'] ?>" >
            </div>
          </div>
		  <?php } 
		  
		  if($keperluan=="INFORMASI" ){
		  ?>
			
			
          <div class="form-group row">
            <label id="lblEmail" class="col-sm-3 col-form-label">Email</label>
            <div class="col-sm-9">
              <input type="text" id="email" name="email" class="form-control" value="<?= $edit['email'] ?>" ">
            </div>
          </div>

          <div class="form-group row">
            <label id="lblRincian" class="col-sm-3 col-form-label">Rincian Informasi</label>
            <div class="col-sm-9">
              <input type="text" id="rincian" name="rincian" class="form-control" value="<?= $edit['rincian'] ?>">
            </div>
          </div>


          <div class="form-group row">
            <label id="lblTujuan" class="col-sm-3 col-form-label">Tujuan Penggunaan Informasi</label>
            <div class="col-sm-9">
              <input type="text" id="tujuan" name="tujuan" class="form-control" value="<?= $edit['tujuan'] ?>" >
            </div>
          </div>

          <div class="form-group row">
            <label id="lblCara"  class="col-sm-3 col-form-label">Cara Memperoleh Informasi</label>
            <div class="col-sm-9">
              <input class="col-sm-2" type='checkbox' id="cara11" name="cara[]" class="form-control" value='1'  <?php if(strpos($edit["cara_mendapat_info"],"1")!==false){ ?> checked="checked" <?php } ?>>
			  <label class="col-sm-8" id="lblCara11" >Melihat/membaca/mendengarkan </label> 
              <input class="col-sm-2" type='checkbox' id="cara12" name="cara[]" class="form-control" value='2'  <?php if(strpos($edit["cara_mendapat_info"],"2")!==false){ ?> checked="checked" <?php } ?>>
			  <label class="col-sm-8" id="lblCara12" >Mendapatkan salinan informasi (Softcopy/hardcopy)</label>
            </div>
          </div>
		  
			<div class="form-group row">
            <label id="lblCara2" class="col-sm-3 col-form-label">Cara Memperoleh Informasi</label>
            <div class="col-sm-9">
              <input class="col-sm-2" type='radio' id="cara21" name="cara2" class="form-control" value='1'  <?php if($edit["cara_memperoleh_info"]==1){ ?> checked="checked" <?php } ?>>
			  <label class="col-sm-8" id="lblCara21" >Mengambil Langsung</label>
              <input class="col-sm-2"  type='radio' id="cara22" name="cara2" class="form-control" value='2' <?php if($edit["cara_memperoleh_info"]==2){ ?> checked="checked" <?php } ?>>
			  <label class="col-sm-8" id="lblCara22" >Email</label>
              <input class="col-sm-2" type='radio' id="cara23" name="cara2" class="form-control" value='3' <?php if($edit["cara_memperoleh_info"]==3){ ?> checked="checked" <?php } ?>>
			  <label class="col-sm-8" id="lblCara23" >Telepon</label>
            </div>
          </div> 
		  <?php }?>

          <div class="form-group row">
            <label id="lblTindakan" class="col-sm-3 col-form-label" style="display: none">Tindakan</label>
            <div class="col-sm-9">
              <select id="tindakan" name="tindakan" class="form-control" style="display: none">
				<option value="<?= $edit['tindakan'] ?>" selected="<?= $edit['tindakan'] ?>">
				<?= $edit['tindakan'] ?></option>
                <option>Pilih Tindakan</option>
                <option>DIIZINKAN</option>
                <option>TIDAK DIIZINKAN</option>
              </select>
            </div>
          </div>
		  
         
          
          <a href="index.php?action=datatamu" class="btn btn-gradient-primary btn-sm"><< Kembali</a>      
          <button type="submit" class="btn btn-gradient-danger btn-sm mr-2">Edit Data</button>

        </form>

      </div>
    </div>
  </div>
</div></div>
<script language="JavaScript">
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