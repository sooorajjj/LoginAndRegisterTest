<?php

$host = "localhost";
$user = "root";
$password = "!nnovations";
$dbname = "ProductionManagement";

$con = mysqli_connect($host, $user, $password, $dbname);

if (!$con) 
{
	die("Connection failed: " . mysqli_connect_error());
} 
else
{
	echo "connection success";
}
// Check connection

?>
