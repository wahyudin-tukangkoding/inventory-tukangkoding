<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$valid['failed'] = array('failed' => false, 'messages' => array());

if($_POST) {

	$editUsersName = $_POST['editUsersName'];
  $editUsersConfirmPassword = $_POST['editUsersConfirmPassword'];
	$editUsersRole = $_POST['editUsersRole'];
  $editUsersEmail = $_POST['editUsersEmail'];
  $usersId = $_POST['usersId'];

  $checkdata = mysqli_query($connect, "SELECT username FROM users WHERE username='$editUsersName' ");
  if (mysqli_num_rows($checkdata) > 0) {
    $valid['failed'] = true;
    $valid['messages'] = "Username Already Exist";
  }
  else {
    $sql = "UPDATE users SET username = '$editUsersName' ,password = '$editUsersConfirmPassword', role = '$editUsersRole', email = '$editUsersEmail' WHERE userID = '$usersId'";

  	if($connect->query($sql) === TRUE) {
  	 	$valid['success'] = true;
  		$valid['messages'] = "Successfully Updated";
  	} else {
  	 	$valid['success'] = false;
  	 	$valid['messages'] = "Error while adding the members";
  	}
  }

	$connect->close();

	echo json_encode($valid);

} // /if $_POST
