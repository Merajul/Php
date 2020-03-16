<?php

require_once 'db.php';

// compulsory parameters
$sender_id = $_POST["sender_id"];
$receiver_id = $_REQUEST["receiver_id"];
$amount = $_REQUEST["amount"];
$start_date = $_REQUEST["start_date"];


// optional parameters
$agreed=$_REQUEST["agreed"];
$due_date=$_REQUEST["due_date"];
$Description=$_REQUEST["Description"];
$recurrence=$_REQUEST["recurrence"];
$dead=$_REQUEST["dead"];

$msg_sender_id = $_REQUEST["msg_sender_id"];


if (!isset($sender_id) || !isset($receiver_id) || !isset($amount) || !isset($start_date)) {
	header($_SERVER["SERVER_PROTOCOL"]." 430 Sender Id, Receiver Id, Amount and StartDate are not optional");
	exit();
}


$qt_agreed = isset($agreed) ? "'$agreed'" : "NULL";
$qt_due_date = isset($due_date) ? "'$due_date'" : "NULL";
$qt_Description = isset($Description) ? "'$Description'" : "NULL";
$qt_recurrence = isset($recurrence) ? "'$recurrence'" : "NULL";
$qt_dead = isset($dead) ? "'$dead'" : "NULL";

$query = "INSERT INTO user_loan (sender_id,receiver_id,amount,start_date,
	agreed,due_date,Description,recurrence,dead)
Output Inserted.id
VALUES('$sender_id','$receiver_id','$amount','$start_date',
	$qt_agreed,$qt_due_date,$qt_Description,$qt_recurrence,$qt_dead)";

$result = sqlsrv_query($conn, $query);
if (!$result) {
	header($_SERVER["SERVER_PROTOCOL"]." 500 Adding TrLn failed");
	exit();
}

$response = array();
while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
	$response[] = array('id'=>$row['id']);
}

sqlsrv_free_stmt($result);
header('Content-Type: application/json');
echo json_encode($response);


// sending a notification to the other user if required
if (isset($msg_sender_id)) {

	if ($msg_sender_id == $sender_id) { $msg_receiver_id = $receiver_id;}
	else {$msg_receiver_id = $sender_id;}

	include "MsgSendNotification.php";
}


sqlsrv_close($conn);
?>