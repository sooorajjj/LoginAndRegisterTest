<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'connection.php'; 

$email =$_POST["email"]; 
$password= password_hash($_POST["password"],PASSWORD_DEFAULT);

$query = "select * from users where email like. '".$email."','".$password."';";
$result = mysqli_query($con,$query);

if(mysqli_num_rows($result)>0)
{
	$response = array();
	$code = "login_true";
	$row = mysqli_fetch_array($result);
	$name = $row[0];
	$message = "LOGIN success !".$name;
	array_push($response,array("code"->$code,"message"->$message));
	echo json_encode(array("server_response"->$response));
}
else
{
	$response = array();
	$code = "login_false";
	$message = "LOGIN failed !";
	array_push($response,array("code"->$code,"message"->$message));
	echo json_encode(array("server_response"->$response));
}

mysqli_close($con);

?>