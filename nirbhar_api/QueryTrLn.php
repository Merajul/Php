<?php

$result = sqlsrv_query ($conn, $query);
$response = array();
while($row = sqlsrv_fetch_array($result)){
	
	$response[] = array(
		'id'=>$row['id'],
		'sender_id'=>$row['sender_id'],
		'receiver_id'=>$row['receiver_id'],
		
		'amount'=>$row['amount'],
		'start_date'=> reset($row['start_date']),
		'agreed'=>$row['agreed'], 
		'due_date'=>reset($row['due_date']),
		'Description' => $row['Description'], 
		'recurrence'=>$row['recurrence'],
		'dead'=>$row['dead']);
}

sqlsrv_free_stmt($result);


?>
