<?php 
require_once "db_connect.php";
$dokter = $_POST['dokterAntri'];
if ($dokter != "") {
	$query = query("SELECT COUNT(a.no_rkm_medis) as jmlPasien , b.nm_dokter, SUM(if(a.stts='Belum',1,0)) as Belum, SUM(if(a.stts='Sudah',1,0)) as Sudah FROM reg_periksa a, dokter b WHERE a.tgl_registrasi ='$date' AND a.kd_dokter = '$dokter' AND a.kd_dokter = b.kd_dokter");
	while ($hasil = fetch_array($query)) {
		$html = "<div class='alert alert-success'><b>Nama Dokter : ".$hasil['nm_dokter']."</b></div>";
		$html .= "<div class='row'>
					<div class='col-md-4 boxGreen'>
						<p align='center'>Total Pasien Terdaftar</p>
						<hr>
						<p align='center'><h3 align='center'>".$hasil['jmlPasien']."</h3></p>
					</div>
					<div class='col-md-4 boxRed'>
						<p align='center'>Pasien Belum Dilayani</p>
						<hr>
						<p align='center'><h3 align='center'>".$hasil['Belum']."</h3></p>
					</div>
					<div class='col-md-4 boxBlue'>
						<p align='center'>Pasien Selesai Dilayani</p>
						<hr>
						<p align='center'><h3 align='center'>".$hasil['Sudah']."</h3></p>
					</div>
					
				  </div>
					
				<div class='alert alert-danger'>*Data diatas belum termasuk pasien batal periksa, pasien sudah dilayani oleh perawat, maupun pasien reservasi yang belum melakukan registrasi ulang</div>
				";
		echo $html;
	}
	
}else{
	echo "Dokter Belum Dipilih";
}
?>