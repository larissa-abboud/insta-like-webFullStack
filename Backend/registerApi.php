<?php
include("connect.php");
//post into database 



if(isset($_POST["username"]) && $_POST["username"] !=""){
    $username = $_POST["username"];
   
    
}else{
   
    $response = [];
    $response["success"] = "false"; 
    
    echo json_encode($response);
    return; 
}


$email = $_POST["email"];
$password = $_POST["password"];


$query = $mysqli->prepare("INSERT INTO users(username, email,password) VALUES (?, ?,?)");
$query->bind_param("sss", $username, $email, $password);
$query->execute();

$response = [];
$response["success"] = true;

echo json_encode($response);