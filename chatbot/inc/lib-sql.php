<?php

function db_connect_ins()
{
$serverName = "AAFA-SQL01\SQLEXPRESS"; //serverName\instanceName

$connectionInfo = array( "Database"=>"chatbotdata", "UID"=>"chatbot-admin", "PWD"=>"chatb0t2020#");
$conn = sqlsrv_connect( $serverName, $connectionInfo);

if( $conn === false){
     die( print_r( sqlsrv_errors(), true));
}
return $conn;

}
?>