<?php
require "db.php";

$phonenumber = $_REQUEST["phonenumber"];

$query = "SELECT * FROM user_info WHERE phonenumber = '$phonenumber'";
include "QueryUser.php";


header('Content-Type: application/json');
echo json_encode($response);

sqlsrv_close($conn);

?>
