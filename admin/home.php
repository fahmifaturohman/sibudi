          <div class="page-header">
            <h3 class="page-title">
              <span class="page-title-icon bg-gradient-primary text-white mr-2">
                <i class="mdi mdi-home"></i>                 
              </span>
              <?php include 'info/waktu.php'; ?>, <?= $datalogin['nama'] ?>
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
            <?php 
              $sql = mysqli_query($db,"SELECT * FROM tamu");
            ?>
            <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-danger card-img-holder text-white">
                <div class="card-body">
                  <h4 class="font-weight-normal mb-3">Total Tamu
                    <i class="mdi mdi-account-multiple mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?= mysqli_num_rows($sql) ?> Tamu</h2>
                </div>
              </div>
            </div>
            <?php
              ini_set("display_errors","off");
              $bulan=date('m');
              $sql2=mysqli_query($db,"SELECT COUNT(id) jumlah FROM tamu WHERE YEAR(tgl) = YEAR(NOW())");
              $row=mysqli_fetch_assoc($sql2);
            ?>
            <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-info card-img-holder text-white">
                <div class="card-body">                 
                  <h4 class="font-weight-normal mb-3">Tamu Bulan Ini
                    <i class="mdi mdi-account-multiple mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?= $row['jumlah']; ?> Tamu</h2>
                </div>
              </div>
            </div>
            <?php
              ini_set("display_errors","off");
              $tgl = date('Y-m-d');
              $sql3=mysqli_query($db,"SELECT * FROM tamu WHERE tgl='$tgl'");
              while ($return=mysqli_fetch_array($sql3)){
              $today += $return['harga'];
              }
            ?>
            <div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">                                  
                  <h4 class="font-weight-normal mb-3">Tamu Hari Ini
                    <i class="mdi mdi-account-multiple mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?= mysqli_num_rows($sql3) ?> Tamu</h2>
                </div>
              </div>
            </div>
			
			
			<?php 
				$sql4=mysqli_query($db,"SELECT COUNT(id) jumlah FROM tamu WHERE YEAR(tgl) = YEAR(NOW())");
				$th = mysqli_fetch_assoc($sql4);
			?>
			<div class="col-md-3 stretch-card grid-margin">
              <div class="card bg-gradient-success card-img-holder text-white">
                <div class="card-body">                                  
                  <h4 class="font-weight-normal mb-3">Tamu Tahun <?=date('Y')?>
                    <i class="mdi mdi-account-multiple mdi-24px float-right"></i>
                  </h4>
                  <h2 class="mb-5"><?=$th['jumlah'];?> Tamu</h2>
                </div>
              </div>
            </div>
			
			
			<div class="col-md-9">
				<div class="col-md-12 card p-5">
				<div id="chartContainer" style="height: 370px; width: 100%;"></div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="col-md-12 card pt-4 pb-4">
					<div id="chartContainer" style="min-height: 360px; width: 100%;">
						<div class="title mb-4 text-dark">5 TAMU TERAKHIR</div>
							<table class="table table-responsive table-striped">
									<tr>
										<th>No</th>
										<th>Nama</th>
										<th>Berkunjung</th>
									</tr>
								<tbody>
									<?php $no =1; $tamu = mysqli_query($db, "SELECT nama, COUNT(nama) jumlah FROM tamu GROUP BY nama ORDER BY id DESC LIMIT 5" ); 
									while ($row =mysqli_fetch_array($tamu)){ ?>
									<tr>
										<td><?=$no++?></td>
										<td><?=$row['nama']?></td>
										<td><?=$row['jumlah']?> Kali</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
					</div>
					<a href="<?=$baseUrl.'/dashboard/excel_all.php'?>" class="btn btn-success btn-blcok mt-3">Report Excel</a>
				</div>
			</div>
			
			
          </div>
        </div>
		
<?php 



$query1=mysqli_query($db,"SELECT MONTH(tgl) bulan,  COUNT(id) jumlah FROM tamu WHERE YEAR(tgl) = YEAR(NOW()) GROUP BY MONTH(tgl) ORDER BY MONTH(tgl) ASC");
$databulan = [];
$no = 0;
while ($return=mysqli_fetch_array($query1)){
	$databulan[$no++] = [
		'bulan' => $return['bulan'],
		'jumlah' => $return['jumlah'],
	];
}
?>
		
		
		
		<script type="text/javascript">
			window.onload = function () {

				var chart = new CanvasJS.Chart("chartContainer", {
					theme: "light1", // "light2", "dark1", "dark2"
					animationEnabled: false, // change to true		
					title:{
						text: "GRAFIK DATA TAMU TAHUN <?=date('Y')?>"
					},
					data: [
					{
						// Change type to "bar", "area", "spline", "pie",etc.
						type: "area",
						dataPoints: [
							 <?php 
                            $bulan = [
                                1 => "Januari",
                                2 => "Februari", 
                                3 => "Maret",
                                4 => "April",
                                5 => "Mei",
                                6 => "Juni",
                                7 => "Juli",
                                8 => "Agustus",
                                9 => "September",
                                10 => "Oktober",
                                11 => "November",
                                12 => "Desember"
                            ];
                            for ($i=1; $i <= count($bulan) ; $i++) {
                                # mencari jumlah request per tahun 
                                $key = array_search($i, array_column($databulan, 'bulan')); //mencari array key di dalam array $data dengan parametr nili i(tahun)
                                $jumlah = ($i == $databulan[$key]['bulan']) ? $databulan[$key]['jumlah']:0; // jika nilai i(tahun) sama dengan tahun di array $data maka akan di tampilkan jumlah request di tahun itu jika tidak nilai requestnya 0
                        ?>                        
                            { label: "<?=$bulan[$i];?>",  y: <?=$jumlah?>  }, 
                        <?php } ?>       
						]
					}
					]
				});
				
				chart.render();

			}
</script>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>