<?php
require "db.php";

$msg_sender_id = $_REQUEST["msg_sender_id"];
$msg_receiver_id = $_REQUEST["msg_receiver_id"];
include "MsgSendNotification.php";

sqlsrv_close($conn);

if (!$result) {
	header($_SERVER["SERVER_PROTOCOL"]." 500 Sending Message Failed");
	exit();
}

$temp = json_decode($result, true);
sqlsrv_free_stmt($result);

if (!$temp["success"]) {
	header($_SERVER["SERVER_PROTOCOL"]." 501 Recipient could not receive the message");
	exit();
}

$response = array();
$response[] = array('id'=>$msg_receiver_id);
header('Content-Type: application/json');
echo json_encode($response);

?>
