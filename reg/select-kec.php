<?php


ob_start();
session_start();


include_once('db_connect.php');
 
$q = $_GET['q'];
 
$sql = query("SELECT kd_kec AS id, nm_kec AS text FROM kecamatan WHERE (kd_kec LIKE '%".$q."%' OR nm_kec LIKE '%".$q."%')");
$num = num_rows($sql);
if($num > 0){
	while($data = fetch_assoc($sql)){
		$tmp[] = $data;
	}
} else $tmp = array();
 
echo json_encode($tmp);

?>
