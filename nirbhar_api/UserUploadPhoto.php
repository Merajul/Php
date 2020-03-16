<?php 
include "db.php";

$id=$_POST['id'];

if (!isset($id)) {
	header($_SERVER["SERVER_PROTOCOL"]." 491 Id not provided");
	exit();
}

$upload_path='uploads/';
$upload_url='http://cloud.nessbit.com'.'/nirbhar_api/'.$upload_path;


$fileinfo=pathinfo($_FILES['file']['name']);
$extension=$fileinfo['extension'];
$newName=$fileinfo['filename'];
$file_url=$upload_url . $newName .'.'.$extension;
$file_path=$upload_path. $newName .'.'.$extension;
$file_name = $_FILES['file'];

$upload_bool = move_uploaded_file($_FILES['file']['tmp_name'],$file_path);
if (!upload_bool) {
	header($_SERVER["SERVER_PROTOCOL"]." 500 User image upload failed, ".$sql);
	exit();
}


$sql = "UPDATE user_info SET user_image='$file_url' WHERE id='$id'";

$query = sqlsrv_query($conn, $sql);
if (!$query) {
	header($_SERVER["SERVER_PROTOCOL"]." 500 User info image update failed, ".$sql);
	exit();
}

$response = null;
if ($query) {
	$response[] = array('id'=>$id, 'user_image'=>$file_url);
} 
header('Content-Type: application/json');
echo json_encode($response);

?>