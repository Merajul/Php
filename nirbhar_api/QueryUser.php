<?php
$result = sqlsrv_query ($conn, $query);
$response = array();

while($row = sqlsrv_fetch_array($result)){
    $response[] = array(
	'id'=>$row['id'], 
	'name'=>$row['name'],
	'phonenumber'=>$row['phonenumber'],
	'nid'=>$row['nid'], 
	'user_image'=>$row['user_image'], 
	'fcm_token'=>$row['fcm_token']);
}
sqlsrv_free_stmt($result);
?>
