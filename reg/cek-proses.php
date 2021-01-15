<?php
 include "db_connect.php";
 if (isset($_POST["lahirmu"] , $_POST["norm"]))
 {
 $lahirmu=$_POST["lahirmu"];
 $norm= $_POST["norm"];

 $result=query("SELECT * FROM booking_registrasi where tanggal_periksa = '$lahirmu' AND  no_rkm_medis = '$norm'");
 $found=num_rows($result);
 
 if($found>0){
    while($row=fetch_array($result)){
    echo "<table style='width: 100%;' class='table'>
						<tr style='padding: 10px;'>
							<td><img src='qrcode/".$row['qrcode']."'> <p><sup><i>".$row['tanggal_booking']."</i></sup></p></td>
							<td>Kode Booking <br>Tgl Periksa</td><td>:<br>:</td><td>".$row['kd_booking']."<br>".$row['tanggal_periksa']."</td>
						</tr>
					
					</table>";
    }   
 }else{
    echo "<span class='alert alert-danger'>Kode Booking Tidak Ditemukan</span>";
 }
}else{
	echo "halaman tidak dapat diakses";
}

?>