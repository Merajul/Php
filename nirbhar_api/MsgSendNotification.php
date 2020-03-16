<?php

// requires pre set of $msg_receiver_id and $msg_sender_id
$query = "SELECT * FROM user_info WHERE id = $msg_receiver_id ";
include "QueryUser.php";
$fcm_key = $response[0]['fcm_token'];
	
$query = "SELECT * FROM user_info WHERE id = $msg_sender_id";
include "QueryUser.php";
if (isset($response[0]['name'])) {$fcm_title = "Msg from ".$response[0]['name'];}
else {$fcm_title = "Msg from 0".$response[0]['phonenumber'];}
		
$fcm_body = "Has updated transactions with you. Please check";

$path_to_fcm = 'https://fcm.googleapis.com/fcm/send';
$server_key = "AAAAxpHuH7c:APA91bGecgM5MPJdcfSjd83VxSogeRZ13QzF5BwaFTDg7F2F0ZQT4uQA7pLp_dzEeuK6ZQa-6BDuE7J0TDygd8SelNkSLnO3zcc6_Js7eB3fjdXJj3HxLRiLr-O7T4QZ-lKCB9KRLZZf";


$headers = array(
	'Authorization:key='.$server_key,
	'Content-Type:application/json'
	);
	
$fields = array(
	'to'=>$fcm_key,
	'notification'=>array(
		'click_action'=>".RegisterActivity",
		'title'=>$fcm_title,
		'body'=>$fcm_body), 
	"data" => array (
		"Nirbhor.intent.extra.msgSenderId"=>$msg_sender_id));
		
$payload = json_encode($fields);

$curl_session = curl_init();
curl_setopt($curl_session, CURLOPT_URL, $path_to_fcm);
curl_setopt($curl_session, CURLOPT_POST, true);
curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);

$result = curl_exec($curl_session);

curl_close($curl_session);


?>
