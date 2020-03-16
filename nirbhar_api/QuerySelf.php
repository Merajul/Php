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
		'fcm_token'=>$row['fcm_token'],
		
		'status'=>$row['status'],
		'referrorid'=>$row['referrorid'],
		'balance'=>$row['balance'],
		'rating'=>$row['rating']);
	
	$return_pass = $row['password'];
}

//echo ("Result is ".$result);
sqlsrv_free_stmt($result);
?>
