<?php
 include "db_connect.php";
 if (isset($_POST["lahirmu"] , $_POST["nik"]))
 {
 $lahirmu=$_POST["lahirmu"];
 $nik=$_POST["nik"];

 $result=query("SELECT * FROM pasien where tgl_lahir = '$lahirmu%' AND  no_ktp = '$nik'");
 $found=num_rows($result);
 
 if($found>0){
    while($row=fetch_array($result)){
    echo "<ul class='alert alert-success' style='padding:10px;'>
    		<li style='padding:10px; list-style-type:none;'>Data Ditemukan $row[nm_pasien] </li>
    		<li style='padding:10px;list-style-type:none;'><b>No Rekam Medis : $row[no_rkm_medis] </b></li>
    		</ul>";
    }   
 }else{
    echo "<span class='alert alert-danger'>Pasien Tidak Ditemukan</span>";
 }
}else{
	echo "halaman tidak dapat diakses";
}
?>