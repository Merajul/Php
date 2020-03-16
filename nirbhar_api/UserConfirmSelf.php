<?php
require "db.php";

$id=$_REQUEST["id"];
$fcm_token = $_REQUEST["fcm_token"];
$status = $_REQUEST["status"];
$password = $_REQUEST["password"];

if (!isset($id) || !isset($fcm_token) || !isset($status) || !isset($password)) {
	header($_SERVER["SERVER_PROTOCOL"]." 449 confirm self reg failed: id, status, password and fcm_token not optional");
	exit("");
}

$query = "UPDATE user_info SET fcm_token = '$fcm_token', status = '$status', password = '$password' WHERE id = '$id'";

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
