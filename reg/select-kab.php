<?php


ob_start();
session_start();


include_once('db_connect.php');
 
$q = $_GET['q'];
 
$sql = query("SELECT kd_kab AS id, nm_kab AS text FROM kabupaten WHERE (kd_kab LIKE '%".$q."%' OR nm_kab LIKE '%".$q."%')");
$num = num_rows($sql);
if($num > 0){
	while($data = fetch_assoc($sql)){
		$tmp[] = $data;
	}
} else $tmp = array();
 
echo json_encode($tmp);

?>
