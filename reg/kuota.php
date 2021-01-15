<?php
 include "db_connect.php";
 if (isset($_POST["tgl"] , $_POST["dok1"]))
 {
 	$tgl_per = $_POST["tgl"];
	$dok1=$_POST["dok1"];

 	$kuota = query("SELECT COUNT(kd_dokter) as jumlah, kd_dokter  From booking_registrasi WHERE kd_dokter= '$dok1' AND tanggal_periksa='$tgl_per' AND status != 'Batal'");
        while ($kot = fetch_array($kuota)) {
            $jmlhe = $kot['jumlah'];
            $doktere = $kot['kd_dokter']; 
            }
            if (condition) {
            	# code...
            }
            if ($jmlhe >= '5'){
                echo "<span class='alert-alert danger'>Kuota Untuk dr. Sumardjo Sudah penuh pada tanggal ".$tgl_per."</span>";
            }
}else{
	echo "Tidak dapat membuka halaman";
}
?>