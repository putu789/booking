<?php
$keyword = $_POST['no_rm'];
ob_start();
include "../view.php";
$html = ob_get_contents(); 
ob_end_clean();
echo json_encode(array('result'=>$html));
?>