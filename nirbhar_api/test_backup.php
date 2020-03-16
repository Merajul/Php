<?php
require "db.php";


// id is 4187
$phonenumber = "1983718561";
$query = "SELECT * FROM user_info WHERE phonenumber = $phonenumber";
$result = sqlsrv_query ($conn, $query);

echo($query." Result: ".$result."<br>");


// id is 4186
$phonenumber = "6654674564";
$query = "SELECT * FROM user_info WHERE phonenumber = $phonenumber";
$result = sqlsrv_query ($conn, $query);

echo($query." Result: ".$result."<br>");

sqlsrv_free_stmt($result);
sqlsrv_close($conn);

?>
