<?php
require_once 'db.php';

$phonenumber = $_REQUEST["phonenumber"];
$password = $_REQUEST["password"];

$query = "SELECT * FROM user_info WHERE phonenumber = '$phonenumber'";
include "QuerySelf.php";
sqlsrv_close($conn);

//echo ($query."... ");

if (sizeof($response) == 0) {
	// phone number not found, return null array
	echo json_encode($response);
} else  {
	if (!isset($return_pass)) {
		// password is not set, i.e. user has been set by another person, return id and status 
		echo json_encode(array(array('id' => $response[0]['id'], 'status'=>$response[0]['status'])));
	} else {
		//echo ("password set. ");
		if ($return_pass == $password) {
			// password matches, return everything
			echo json_encode($response);
		} else {
			// password doesn't match, only return status, leave id null
			echo json_encode(array(array('status'=>$response[0]['status'])));
		}
	}
}




?>
