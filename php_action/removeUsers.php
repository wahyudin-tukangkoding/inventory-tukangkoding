<?php

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$usersId = $_POST['usersId'];

if($usersId) {

 $sql = "DELETE FROM users WHERE users . userID = {$usersId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the brand";
 }

 $connect->close();

 echo json_encode($valid);

} // /if $_POST
