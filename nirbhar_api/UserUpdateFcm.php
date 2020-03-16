<?php
require "db.php";

$id=$_REQUEST["id"];
$fcm_token = $_REQUEST["fcm_token"];

if (!isset($id) || !isset($fcm_token)) {
	header($_SERVER["SERVER_PROTOCOL"]." 448 fcm token update failed: id and fcm_token not optional");
	exit("");
}


$query = "UPDATE user_info SET fcm_token = '$fcm_token' WHERE id = '$id'";

$result = sqlsrv_query($conn, $query);
if (!$result) {
	header($_SERVER["SERVER_PROTOCOL"]." 500 User update failed");
	exit();
}

$response = null;
if ($result) {
	$response[] = array('id'=>$id);
} 
header('Content-Type: application/json');
echo json_encode($response);

?>
