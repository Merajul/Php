<?php
require "db.php";

// decode the array of ids from the url into an array and then a string separated by comma
$query_arr = explode("&", $_SERVER['QUERY_STRING']);
$id_arr = array();
foreach ($query_arr as $tmp_arr_param) {
    $split_param = explode("=", $tmp_arr_param);
    if ($split_param[0] == "id") {
        $id_arr[] = intval(urldecode($split_param[1]));
    }
}
$check = implode(',',$id_arr);


// run a query on the data for those ids
$query = "SELECT * from user_info WHERE id in ($check)";
include "QueryUser.php";

sqlsrv_close($conn);

// return the results
header('Content-Type: application/json');
echo json_encode($response);

?>
