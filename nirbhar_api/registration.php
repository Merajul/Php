<?php

require_once 'db.php';

$name = $_REQUEST["name"];
$name = isset($name) ? "'$name'" : "NULL";

$phonenumber = $_REQUEST["phonenumber"];
$phonenumber = isset($phonenumber) ? "'$phonenumber'" : "NULL";

$password = $_REQUEST["password"];
$password = isset($password) ? "'$password'" : "NULL";

$nid = $_REQUEST["nid"];
$nid = isset($nid) ? "'$nid'" : "NULL";

$status = $_REQUEST["status"];
$status = isset($status) ? "'$status'" : "NULL";

$referrorid = $_REQUEST["referrorid"];
$referrorid = isset($referrorid) ? "'$referrorid'" : "NULL";

$balance = $_REQUEST["balance"];
$balance = isset($balance) ? "'$balance'" : "NULL";

$rating = $_REQUEST["rating"];
$rating = isset($rating) ? "'$rating'" : "NULL";

$sql = "INSERT INTO user_info (name,phonenumber, password,nid,status,referrorid,balance,rating)
Output Inserted.id, Inserted.phonenumber, Inserted.password
VALUES($name, $phonenumber, $password, $nid, $status, $referrorid, $balance, $rating)";

$query = sqlsrv_query($conn, $sql);

$response = array();
if ($query) {	
	while($row = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC)) {
		$response[] = $row;
    }
} 
header('Content-Type: application/json');

echo json_encode($response);
?>