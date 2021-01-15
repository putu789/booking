<?php


ob_start();
session_start();


include_once('db_connect.php');
 
$q = $_GET['q'];
 
$sql = query("SELECT kd_prop AS id, nm_prop AS text FROM propinsi WHERE (kd_prop LIKE '%".$q."%' OR nm_prop LIKE '%".$q."%')");
$num = num_rows($sql);
if($num > 0){
	while($data = fetch_assoc($sql)){
		$tmp[] = $data;
	}
} else $tmp = array();
 
echo json_encode($tmp);

?>
