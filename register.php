<?php

require 'connection.php'; 

$name =$_POST["name"]; 
$email =$_POST["email"]; 
$password =$_POST["password"]; 

$query="select * form users where email like '".$email."';"; 
$result = mysqli_query($con,$query);

if(mysqli_num_rows($result)>0)
{
	$response = array();
	$code = "reg_false";
	$message = "User ALready Exist....";
	array_push($response,array("code"->$code,"message"->$message));
	echo jason_encode(array("server_response"->$response));
}
else
{
	$query = "insert into users values('".$name."','".$email."','".$password."');";
	$result = mysqli_query($con,$query);

	if(!$result)
	{
		$response = array();
		$code = "reg_false";
		$message = "Server Error - Try again...";
		array_push($response,array("code"->$code,"message"->$message));
		echo jason_encode(array("server_response"->$response));
	}
	else
	{
		$response = array();
		$code = "reg_true";
		$message = "Registration Success ... Thank you !";
		array_push($response,array("code"->$code,"message"->$message));
		echo jason_encode(array("server_response"->$response));
	}

	mysqli_close($con);
}

?>