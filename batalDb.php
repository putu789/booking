<?php 
include "db_connect.php";
if (isset($_POST["noRm"] , $_POST["tglPeriksa"], $_POST["dokterDaftar"]))
 {
 	$no_rkm_medis=$_POST["noRm"];
	$tgl_periksa=$_POST["tglPeriksa"];
	$dokter = $_POST['dokterDaftar'];
 	$query = query("UPDATE booking_registrasi SET status='Batal' WHERE no_rkm_medis= '$no_rkm_medis' AND tanggal_periksa = '$tgl_periksa' AND kd_dokter = '$dokter'");
 	if ($query) {
 		echo "Data Berhasil Dirubah";
 	}
 }else{
	echo "halaman tidak dapat diakses";
}
?>