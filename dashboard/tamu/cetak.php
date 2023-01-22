<?php
     require '../../configuration/dbcon.php';
$id	 	 = $_GET['id'];
   function tgl_indo2($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}

//header("Content-type: application/vnd.ms-excel");
//header("Content-Disposition: attachment;Filename=Laporan Kinerja PTA Bandar Lampung.xls");
?>
<html>
<head>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">
        <style>
            h2{
                text-align: center
            }
            .mytable{
                border:1px solid black;
                border-collapse: collapse;
                width: 100%;
            }
            .mytable tr th, .mytable tr td{
                border:1px solid black;
                padding: 5px 10px;
            }
			
.style2 {font-size: 14px}
        .style3 {font-size: 12px}
        </style>
</head>
<body>


	
<table align="right">
<tr><td colspan="5"></td>
<td colspan="4">
Lampiran III<br>
Surat Keputusan Ketua MA RI<br>
Nomor 	: 1-144-/KMA/SK/I/2011<br>
Tanggal : 5 Januari 2011 <br>
</td></tr>
</table>
<p></p>
<h2>&nbsp;</h2>
    
<table class="mytable">
     <tr>
	   <th width="5%" height="auto"><div align="center"><img src="<?= 'logo.png'?>" class="rounded-0" style="width:50%;max-width:200px;height:auto  "/></div></th>
     	<th colspan="4"><div align="center">PENGADILAN TINGGI AGAMA BANDAR LAMPUNG<br>
            <span class="style2">Jl.  Basuki Rahmat No. 24, Telp. 0721-489813, 0721-489814, Faks. 0721-476054 <br>
E-mail :  pta_bandarlampung@yahoo.co.id,&nbsp; Website :  www.pta-bandarlampung.go.id</span></div>     	  </th>		
  </tr>

	<?php $query = mysqli_query($db, "SELECT * FROM tamu WHERE id=$id") or die(mysqli_error);
          while ($tamu = mysqli_fetch_assoc($query)) {
	?>
	<tr valign="top">
	  <td colspan="5"><div align="center">
        <p><strong>BUKTI PENGAJUAN PERMOHONAN INFORMASI <br>
        Model A&mdash;Untuk Prosedur Biasa </strong></p>
        <table width="400" border="0" cellpadding="0" cellspacing="0">
          <tr>
            <td width="0" height="0">Tanggal Pengajuan  Permohonan</td>
            <td align="center" width="30%"><?php echo date('d-m-Y', strtotime($tamu['tgl']))?></td>
          </tr>
          <tr>
            <td width="0" height="0">Tanggal Pemberitahuan  Tertulis*</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td width="0" height="0">Nomor Pendaftaran**</td>
            <td>&nbsp;</td>
          </tr>
        </table>
		<br>
        <table border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td width="169" valign="top"><p>Nama </p></td>
            <td width="18" valign="top"><p align="center">: </p></td>
            <td width="437" colspan="2" valign="top"><p><?php echo $tamu["nama"];?></p></td>
          </tr>
          <tr>
            <td width="169" valign="top"><p>Alamat </p></td>
            <td width="18" valign="top"><p align="center">: </p></td>
            <td width="437" colspan="2" valign="top"><p><?php echo $tamu["alamat"];?></p></td>
          </tr>
          <tr>
            <td width="169" valign="top"><p>Pekerjaan </p></td>
            <td width="18" valign="top"><p align="center">: </p></td>
            <td width="437" colspan="2" valign="top"><p><?php echo $tamu["pekerjaan"];?></p></td>
          </tr>
          <tr>
            <td width="169" valign="top"><p>Nomor telepon/email </p></td>
            <td width="18" valign="top"><p align="center">: </p></td>
            <td width="437" colspan="2" valign="top"><p><?php echo $tamu["nohp"];?> / <?php echo $tamu["nohp"];?></p></td>
          </tr>
          <tr>
            <td width="169" valign="top"><p>Rincian Informasi yang<br>
              dibutuhkan </p></td>
            <td width="18" valign="top"><p align="center">: </p></td>
            <td width="437" colspan="2" valign="top"><p><?php echo $tamu["rincian"];?></p></td>
          </tr>
          <tr>
            <td width="169" valign="top"><p>Tujuan penggunaan<br>
              informasi </p></td>
            <td width="18" valign="top"><p align="center">: </p></td>
            <td width="437" colspan="2" valign="top"><p><?php echo $tamu["tujuan"];?></p></td>
          </tr>
          <tr>
            <td width="169" valign="top"><p>&nbsp;</p></td>
            <td width="18" valign="top"><p>&nbsp;</p></td>
            <td width="437" colspan="2" valign="top"><p>&nbsp;</p></td>
          </tr>
          <tr>
            <td width="169" rowspan="2" valign="top"><p>Cara memperoleh<br>
              informasi** </p>              </td>
            <td width="18" valign="top"><p align="center">: </p></td>
            <td colspan="2" valign="bottom"><p>
              <input name="checkbox1" type="checkbox" <?php if(strpos($tamu["cara_mendapat_info"],"1")!==false){ ?> checked="checked" <?php } ?>>
          Melihat/membaca/mendengarkan **** </p>
            </tr>
          <tr>
            <td width="18" valign="top"><p>&nbsp;</p></td>
            <td colspan="2" valign="top"><p>
              <input name="checkbox2" type="checkbox" <?php if(strpos($tamu["cara_mendapat_info"],"2")!==false){ ?> checked="checked" <?php } ?>>
            Mendapatkan salinan informasi (Softcopy/hardcopy) **** </p></td>
          </tr>
          <tr>
            <td width="169" rowspan="2" valign="top"><p>Cara mendapatkan<br>
              informasi** </p>              </td>
            <td width="18" valign="top"><p align="center">: </p></td>
            <td width="218" valign="top"><p>
              <input name="checkbox3" type="checkbox" <?php if($tamu["cara_memperoleh_info"]==1){ ?> checked="checked" <?php } ?>>
            Mengambil langsung</p></td>
            <td width="219" valign="top"><input name="checkbox4" type="checkbox" <?php if($tamu["cara_memperoleh_info"]==2){ ?> checked="checked" <?php } ?>>
Email </td>
          </tr>
          <tr>
            <td width="18" valign="top"><p>&nbsp;</p></td>
            <td width="437" colspan="2" valign="top"><p>
              <input name="checkbox5" type="checkbox" <?php if($tamu["cara_memperoleh_info"]==3){ ?> checked="checked" <?php } ?>>
            Telepon </p></td>
          </tr>
        </table>
	<br>
        <table style="border:none" width="700" >
            <td style="border:none" ><div align="center">Petugas Informasi,</div></td>
            <td style="border:none" >&nbsp;</td>
            <td style="border:none"><div align="center">Pemohon Informasi , </div></td>
          </tr>
          <tr>
            <td style="border:none"><p>&nbsp;</p>
            <p>&nbsp;</p></td>
            <td style="border:none">&nbsp;</td>
            <td style="border:none">&nbsp;</td>
          </tr>
          <tr>
            <td style="border:none"><div align="center">(<?php echo $tamu["bertemu"];?>)</div></td>
            <td style="border:none">&nbsp;</td>
            <td style="border:none"><div align="center">(<?php echo $tamu["nama"];?>)</div>
            </td>
          </tr>
        </table>
        <p>&nbsp;</p>
        <p align="left" class="style3">*          Diisi oleh Petugas<br>
          **         Diisi oleh petugas berdasarkan nomor registrasi permohonan Informasi Publik yang terdaftar dalam Buku Register<br>
          Permohonan Informasi<br>
          ***       Pilih salah satu dengan memberi tanda (&radic;)<br>
          ****      Coret yang tidak perlu        </p>
        </div></td>
  </tr>
	<?php } ?>
</table>
<p></p>			
<p align="right">&nbsp;</p>
   <p align="right">&nbsp;</p>
   <p align="right">&nbsp;</p>
</body>
</html>