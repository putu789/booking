<?php 
include "db_connect.php";
	$result = query("
		SELECT
		jadwal.kd_poli,poliklinik.nm_poli,
		DATE_FORMAT(jadwal.jam_mulai, '%H:%i') AS jam_mulai,
		DATE_FORMAT(jadwal.jam_selesai, '%H:%i') AS jam_selesai
		FROM
		jadwal,
		poliklinik,
		dokter
		WHERE
		jadwal.kd_poli = poliklinik.kd_poli
		AND
		(jadwal.kd_poli <> 'IGDK' AND jadwal.kd_poli <> 'U0009' AND jadwal.kd_poli <> '	
U0013'  AND jadwal.kd_poli <> 'UMU')
		AND
		jadwal.kd_dokter = dokter.kd_dokter
		
		GROUP BY
		poliklinik.kd_poli
		");
	$html = "<option value=''>-- Pilih Poliklinik --</option>";
	while($data = fetch_array($result)){
                      $woy = $data['nm_poli'];
                      $html .= "<option value='".$data['kd_poli']."|".$data['nm_poli']."'>".$data['nm_poli']."</option>";
                    }
$callback = array('data_poli'=>$html); 
echo json_encode($callback);
?>