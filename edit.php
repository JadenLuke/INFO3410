<?php
require 'lib.php';

if ( isset($_GET['accept']))
{
    $accept = $_GET['accept'];
    if ($accept == 3)
        update();

    if ($accept == 2)
        updateuser();
}


function update (){
	$id = $_GET['data0'];
    $fname = $_GET['data1'];
    $lname = $_GET['data2'];
    $dob = $_GET['data3'];
    $sex = $_GET['data4'];
    $contact = $_GET['data5'];
    $address = $_GET['data6'];

	global $conn;
	$sql = "UPDATE `members` SET `fname` = '".$fname."', `lname` = '".$lname."', `dob` = '".$dob."', `sex` = '".$sex."', `number` = ".$contact.", `address` = '".$address."' WHERE `members`.`id` = ". $id;
    $conn->query($sql);
    
    echo "User Updated!";
    $conn->close();
}

function updateuser (){
    $id = $_GET['data0'];
    $username = $_GET['data1'];
    $organization = $_GET['data2'];
    $type = $_GET['data3'];
    

	global $conn;
	$sql = "UPDATE `users` SET `username` = '".$username."', `type` = '".$type."' WHERE `users`.`id` = ". $id;
    $conn->query($sql);
    
    echo "User Updated!";
    $conn->close();
}






