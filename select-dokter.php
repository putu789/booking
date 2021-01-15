<?php
ob_start();
session_start();
include_once('db_connect.php');
$q = $_GET['q'];
$sql = query("SELECT DISTINCT a.kd_dokter AS id, a.nm_dokter AS text FROM dokter a, jadwal b WHERE a.kd_dokter = b.kd_dokter AND a.kd_sps <>'-' AND (a.kd_dokter LIKE '%".$q."%' OR a.nm_dokter LIKE '%".$q."%' )");
$num = num_rows($sql);
if($num > 0){
	while($data = fetch_assoc($sql)){
		$tmp[] = $data;
	}
} else $tmp = array();
echo json_encode($tmp);

?>
