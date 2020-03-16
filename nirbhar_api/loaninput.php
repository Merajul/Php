<?php

require_once 'db.php';


$sender_id=$_REQUEST["sender_id"];
$receiver_id=$_REQUEST["receiver_id"];
$amount=$_REQUEST["amount"];
$start_date=$_REQUEST["start_date"];
$agreed=$_REQUEST["agreed"];
 $due_date=$_REQUEST["due_date"];
$Description=$_REQUEST["Description"];
$recurrence=$_REQUEST["recurrence"];
$dead=$_REQUEST["dead"];
$msgdate=$_REQUEST["msgdate"];
$msgsentsender=$_REQUEST["msgsentsender"];
$msgtype=$_REQUEST["msgtype"];
$msgextra=$_REQUEST["msgextra"];
// $sql= "INSERT INTO user_loan (sender_id,receiver_id,amount,start_date,agreed,due_date,Description,recurrence,dead,msgdate,msgsentsender,msgtype,msgextra)
//  VALUES
//   ('$sender_id','$receiver_id','$amount','$start_date','$agreed','$due_date','$due_date','$recurrence','$dead','','')";


 $sql = "INSERT INTO user_loan (sender_id,receiver_id,amount,start_date,agreed,due_date,Description,recurrence,dead,msgdate,msgsentsender,msgtype,msgextra)VALUES
 ('$sender_id','$receiver_id','$amount','$start_date','$agreed','$due_date','$Description','$recurrence','$dead','$msgdate','$msgsentsender','$msgtype','$msgextra')";

$statement = sqlsrv_query($conn, $sql);
if ($statement == false) {
    echo json_encode (array('response' => "failed"));
} else {
    echo json_encode(array('response' => "successfully"));
}

?>