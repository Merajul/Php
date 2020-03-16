<?php 
require "db.php";

// this assumes one of the sender or receiver id's in the transaction is the same as message sender id
$id=$_REQUEST["id"];
$agreed=$_REQUEST["agreed"];
$dead=$_REQUEST["dead"];
$msg_sender_id =$_REQUEST["msg_sender_id"];

if ((!isset($id)) || (!isset($agreed)) || (!isset($dead))) {
	header($_SERVER["SERVER_PROTOCOL"]." 441 TrLn update: id, agreed and dead not optional");
	exit();
}

//echo ("id: ".$id.", agreed: ".$agreed.", dead ".$dead.", sender id: ".$msg_sender_id);

$query = "UPDATE user_loan SET agreed= '$agreed', dead= '$dead' WHERE id= '$id'";

$result = sqlsrv_query($conn, $query);
if (!$result) {
	header($_SERVER["SERVER_PROTOCOL"]." 500 TrLn update failed");
	exit();
}

$response = null;
if ($result) {
	$response[] = array('id'=>$id);
} 
sqlsrv_free_stmt($result);
header('Content-Type: application/json');
echo json_encode($response);


if (isset($msg_sender_id)) {
	$query = "SELECT * FROM user_loan WHERE id = $id";
	include "QueryTrLn.php";

	if ($msg_sender_id == $response[0]['sender_id']) { $msg_receiver_id = $response[0]['receiver_id'];}
	else {$msg_receiver_id = $response[0]['sender_id'];}

	include "MsgSendNotification.php";
}

sqlsrv_close($conn);


?>