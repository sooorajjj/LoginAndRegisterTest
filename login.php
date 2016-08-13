<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'connection.php'; 

$email =$_POST["email"]; 
// $password =$_POST["password"];
$password= password_hash($_POST["password"],PASSWORD_DEFAULT);

// $params = array(
//     'email' => $email,
//     'password' => $password,
// );

$statement = mysqli_prepare($con, "SELECT * FROM users WHERE email = ? AND password = ?");
mysqli_stmt_bind_param($statement, "ss", $email, $password);
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
 mysqli_stmt_bind_result($statement, $User_ID,	 $email, $password);

$response = array();
$response["success"] = false;


 while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;
        $response["name"] = $name;
        $response["email"] = $email;
        $response["password"] = $password;
    }
    
    echo json_encode($response);



// $query = "select * from users where 'email=admin@admin.com'";
// $result = $con->query($query);
// print_r($result);
//$query = "select * from users where email like. '".$email."','".$password."';";
// $result = mysqli_query($con,$query);

// if(mysqli_num_rows($result)>0)
// {
// 	$response = array();
// 	$code = "login_true";
// while($row = mysqli_fetch_array($result))
// {
	// echo $row['email'];
// }
// 	$name = $row[0];
// 	$message = "LOGIN success !".$name;
// 	array_push($response,array("code"->$code,"message"->$message));
// 	echo jason_encode(array("server_response"->$response));
// }
// else
// {
// 	$response = array();
// 	$code = "login_false";
// 	$message = "LOGIN failed !";
// 	array_push($response,array("code"->$code,"message"->$message));
// 	echo jason_encode(array("server_response"->$response));
// }

//mysqli_close($con);

?>