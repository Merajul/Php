<?php
require "db.php";
  ini_set('display_errors', 1);


//----------data one----------

$phonenumber = "2426253424";
$query = "SELECT * FROM user_info WHERE phonenumber = '$phonenumber'";

$result = sqlsrv_query ($conn, $query);

while( $row = sqlsrv_fetch_array(
 $result, SQLSRV_FETCH_ASSOC) ) {
      echo $row['id'].", ".$row['phonenumber']."<br />";
}	

sqlsrv_free_stmt($result);




//----------data two----------
	
$phonenumber1 = "1983718561";
$query1 = "SELECT * FROM user_info WHERE phonenumber = '$phonenumber1'";

$result1 = sqlsrv_query ($conn, $query1);

while( $row1 = sqlsrv_fetch_array(
 $result1, SQLSRV_FETCH_ASSOC) ) {
      echo $row1['id'].", ".$row1['phonenumber']."<br />";
}	
sqlsrv_free_stmt($result1);








?>
