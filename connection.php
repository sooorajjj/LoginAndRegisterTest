<?php
$con = mysqli_connect("localhost", "root", "rockdeck", "ProductionManagement");

if ($conn->connect_error) 
{
	die("Connection failed: " . $conn->connect_error);
} 
else
{
	echo "connection success";
}
// Check connection

?>
