<?php

$serverName = "localhost";

$connectionInfo = array(
    "Database" => "nirbhor",
    "Uid" => "root",
    "PWD" => "password",
    "CharacterSet" => "UTF-8"
);

$conn = sqlsrv_connect( $serverName, $connectionInfo);

?> 
