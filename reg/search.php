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
    echo "$row[no_rkm_medis]|$row[nm_pasien]|$row[jk]|$row[alamat]|$row[no_tlp]";
    }   
 }else{
    echo "";
 }
}else{
	echo "Tidak dapat membuka halaman";
}
?>