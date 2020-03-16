<?php 
include "db.php";

$upload_path='image/';
$upload_url='http://cloud.nessbit.com'.'/nirbhar_api/'.$upload_path;
//$upload_url='http://27.147.156.154'.'/nirbhar_api/'.$upload_path;

$fileinfo=pathinfo($_FILES['file']['name']);
$extension=$fileinfo['extension'];
//$newName=getFileName();
$newName=$fileinfo['filename'];
$file_url=$upload_url . $newName .'.'.$extension;
$file_path=$upload_path. $newName .'.'.$extension;

if (move_uploaded_file($_FILES['file']['tmp_name'],$file_path)) {}

$name=$_REQUEST["name"];
$phonenumber = $_REQUEST["phonenumber"];
$nid = $_REQUEST["nid"];

$sql = "INSERT INTO user_info (name,phonenumber,nid,image) VALUES(N'$name',N'$phonenumber',N'$nid',N'$file_url')";

$statement = sqlsrv_query($conn, $sql);
if ($statement == false) {
	echo json_encode(array('response' => "failed"));
} else {
	echo json_encode(array('response' => "success"));
}

?>