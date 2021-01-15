<?php
 include "db_connect.php";
 if (isset($_POST["tgl_lahir"] , $_POST["no_rm"]))
 {
 $tgl_lahir=$_POST["tgl_lahir"];
 $no_rm=$_POST["no_rm"];

 $result=query("SELECT * FROM pasien where tgl_lahir = '$tgl_lahir' AND  no_rkm_medis = '$no_rm'");
 $found=num_rows($result);
 
 if($found>0){
    while($row=fetch_array($result)){
    echo "<div class='panel panel-info'>
		    <div class='panel-heading'>Detail Data Pasien</div>
		  		<div class='panel-body'>
    		<div class='form-group'>
    		<label>No rekam Medis</label>
    		<input type='text' disabled='disabled' id='nomerrek' class='form-control' value='$row[no_rkm_medis]'>
    		</div>
    		<div class='form-group'>
    		<label>Nama Pasien</label>
    		<input type='text' disabled='disabled' class='form-control' value='$row[nm_pasien]'>
    		</div>
    		<div class='form-group'>
    		<label>Jenis Kelamin</label>
    		<input type='text'  class='form-control' id='kelamin' value='$row[jk]'>
    		<label>Alamat</label>
    		<input type='text'  class='form-control' value='$row[alamat]'>
    		</div>";
   	echo "</div>
    		</div>";
    }   
 }else{
    echo "<ul class='alert alert-danger' style='padding:10px;'>
    		<li style='padding:10px; list-style-type:none;'>Pasien Tidak Ditemukan</
    		</ul>";
 }
}else{
    echo "Tidak dapat membuka halaman";
}
?>