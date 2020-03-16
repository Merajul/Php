<?php
require_once 'db.php';


$id = $_REQUEST["id"];

$query = "SELECT * FROM user_loan WHERE sender_id = '$id' OR receiver_id = '$id'";
include "QueryTrLn.php";

//header('Content-Type: application/json');
echo json_encode($response);

?>
