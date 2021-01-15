<?php 
include "db_connect.php";
if (isset($_POST["poli"])){
$poli = $_POST['poli'];
$result = query("
                                    SELECT
                                        jadwal.kd_poli
                                    FROM
                                        jadwal,
                                        poliklinik,
                                        dokter
                                    WHERE
                                        jadwal.kd_poli = poliklinik.kd_poli
                                    AND
                                        jadwal.kd_dokter = dokter.kd_dokter
                                    
                            ");
                            while ($data = fetch_array($result)) {
                             

                            $hasil2 = query("
                                        SELECT DISTINCT
                                            jadwal.kd_dokter,
                                            dokter.nm_dokter
                                        FROM
                                            jadwal,
                                            poliklinik,
                                            dokter
                                        WHERE
                                            jadwal.kd_poli = poliklinik.kd_poli
                                        AND
                                            jadwal.kd_dokter = dokter.kd_dokter
                                        AND
                                            jadwal.kd_poli = '$poli'
                                        
                                    ");
$html = "<option value=''>-- Pilih Dokter --</option>";
 while ($data2 = fetch_array($hasil2)) { 
  $html .= "<option value='".$data2['kd_dokter']."'>".$data2['nm_dokter']."</option>"; 
}
}
$callback = array('data_kota'=>$html); 
echo json_encode($callback); 
}else{
    echo "Halaman Tidak Dapat Dimuat";
}
?>