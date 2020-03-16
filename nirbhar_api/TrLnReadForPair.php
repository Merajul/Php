<?php
require_once 'db.php';
$user_id = $_REQUEST["user_id"];
$friend_id = $_REQUEST["friend_id"];

$query = "SELECT * FROM user_loan WHERE 
	((sender_id = '$user_id' AND receiver_id = '$friend_id') OR 
	(sender_id = '$friend_id' AND receiver_id = '$user_id'))";
include "QueryTrLn.php";

header('Content-Type: application/json');
echo json_encode($response);

?>
