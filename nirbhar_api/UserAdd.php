<?php
require_once 'db.php';

$phonenumber = $_REQUEST["phonenumber"];
$password = $_REQUEST["password"];
$nid = $_REQUEST["nid"];
$name = $_REQUEST["name"];
$referrorid = $_REQUEST["referrorid"];
$status = $_REQUEST["status"];
$fcm_token = $_REQUEST["fcm_token"];



$qt_password = isset($password) ? "'$password'" : "NULL";
$qt_nid = isset($nid) ? "'$nid'" : "NULL";
$qt_name = isset($name) ? "'$name'" : "NULL";
$qt_referrorid = isset($referrorid) ? "'$referrorid'" : "NULL";
$qt_status = isset($status) ? "'$status'" : "NULL";
$qt_fcm_token = isset($fcm_token) ? "'$fcm_token'" : "NULL";



// this shouldn't happen, there is a check that phone number of 10 digits is provided
if (!isset($phonenumber)) {
	header($_SERVER["SERVER_PROTOCOL"]." 421 Phone number not provided");
	exit();
}

$query = "SELECT * FROM user_info WHERE phonenumber = '$phonenumber'";
include "QueryUser.php";
if (sizeof($response) > 0) {
	header($_SERVER["SERVER_PROTOCOL"]." 420 Phone number already exists");
	exit();
}

$query = "INSERT INTO user_info (phonenumber, password, nid, name, referrorid, balance, rating, status, fcm_token)
	Output Inserted.id, Inserted.phonenumber, Inserted.password
	VALUES('$phonenumber', $qt_password, $qt_nid, $qt_name, $qt_referrorid, 0, 5000, $qt_status, $qt_fcm_token)";

$result = sqlsrv_query($conn, $query);
if (!$result) {
	header($_SERVER["SERVER_PROTOCOL"]." 500 Registration failed status: ".$qt_status." token: ".$qt_fcm_token);
	exit();
}

$response = array();
while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
	$response[] = array('id'=>$row['id'], 'phonenumber'=>$row['phonenumber']);
}
sqlsrv_free_stmt($result);

header('Content-Type: application/json');
echo json_encode($response);

sqlsrv_close($conn);
?>