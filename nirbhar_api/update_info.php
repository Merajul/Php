<?php 
require "db.php";
$response = null;
$id=$_POST['id'];
$name=$_POST['name'];
$phonenumber=$_POST['phonenumber'];
$password=$_POST['password'];
$nid=$_POST['nid'];

$sql = "UPDATE user_info SET name=N'$name',phonenumber=N'$phonenumber',password=N'$password',nid=N'$nid' WHERE id=$id";


$resSql = sqlsrv_query($conn, $sql);

if ($resSql) {
	echo json_encode(array('response' => "user_updated"));
} else echo json_encode(array('response' => "failed"));
?>