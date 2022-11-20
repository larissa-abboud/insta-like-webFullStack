<?php
include("connect.php");
//get info from databse to check.


/**
 * take username 
 * check in database if exists
 * return true if exist
 */
$username = $_GET["username"] ??"" ;
$password = $_GET["password"] ??"";





$query = $mysqli->prepare("Select username,password from users");
$query->bind_param("ss", $username ,$password);
$query->execute();

$array = $query->get_result();
$response = [];
while($user = $array->fetch_assoc()){
    $response[] = $user;
}

echo json_encode($response);