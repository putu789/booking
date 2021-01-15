<?php


ob_start();
session_start();


include_once('db_connect.php');
 
$q = $_GET['q'];
 
$sql = query("SELECT kd_kel AS id, nm_kel AS text FROM kelurahan WHERE (kd_kel LIKE '%".$q."%' OR nm_kel LIKE '%".$q."%')");
$num = num_rows($sql);
if($num > 0){
	while($data = fetch_assoc($sql)){
		$tmp[] = $data;
	}
} else $tmp = array();
 
echo json_encode($tmp);

?>
