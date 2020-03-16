<?php
require "db.php";

$id=$_REQUEST["id"];
$nid = $_REQUEST["nid"];
$name = $_REQUEST["name"];

if (!isset($id)) {
	header($_SERVER["SERVER_PROTOCOL"]." 442 User update: id not optional");
	exit("");
}

if ((!isset($nid)) && (!isset($name))) {
	header($_SERVER["SERVER_PROTOCOL"]." 443 Either NID or name is required");
	exit();
}

$ini_comma = "";

if (isset($nid)) {$query_nid = $ini_comma."nid='$nid'"; $ini_comma = ",";
} else {$query_nid = "";}

if (isset($name)) {$query_name = $ini_comma."name='$name'"; $ini_comma = ",";
} else {$query_name = "";}



$query = "UPDATE user_info SET $query_nid $query_name WHERE id='$id'";

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
