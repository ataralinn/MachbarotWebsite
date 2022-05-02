<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "machbarot";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
	die("Connection Failed: ". mysqli_connect_error());
}





 


