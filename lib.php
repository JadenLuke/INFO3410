<?php
session_start(); 
$conn = new mysqli("sql9.freemysqlhosting.net", "sql9170594", "vMJHFULHsl", "sql9170594");


if ( isset($_GET['username']) && isset($_GET['password']))
{
    $accept = $_GET['accept'];
    if ($accept == 1)
        signup();

    if ($accept == 0)
        login();
}


function signup (){
	$username = $_GET['username'];
	$password = $_GET['password'];
	$password = sha1($password);
	$organisation = $_GET['organisation'];

	global $conn;
	$insql = "INSERT INTO users(`username`, `password`, `organization`, `type`) values ('$username', '$password', '$organisation', 'Viewer')";
    $conn->query($insql);
    $id = $conn->insert_id;

	if ($id > 0)
        echo "User Added!";
    else
        echo "Unable To Sign Up";
    $conn->close();
}


function login(){
	$username = $_GET['username'];
	$password = $_GET['password'];
	$password = sha1($password);

	global $conn;
	$sql = "SELECT `username`, `password`, `type`, `organization` FROM `users` WHERE `username` = '".$username."' AND `password` = '".$password."'";
    $res = $conn->query($sql);
    
    if($res->num_rows > 0){
        $row = $res->fetch_assoc();
        $_SESSION["type"] = $row['type'];
        $_SESSION["organization"] = $row['organization'];
        echo "Welcome " .  $_SESSION["type"] . " - " . $username;
    }
    else{
        echo "Incorrect User Name / Password";
    }
    $conn->close();

}





