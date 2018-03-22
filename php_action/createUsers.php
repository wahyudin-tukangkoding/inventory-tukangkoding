<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$valid['failed'] = array('failed' => false, 'messages' => array());

if($_POST) {

	$usersName = $_POST['usersName'];
	$usersConfirmPassword = $_POST['usersConfirmPassword'];
  $usersRole = $_POST['usersRole'];
  $usersEmail = $_POST['usersEmail'];

  $checkdata = mysqli_query($connect, "SELECT username FROM users WHERE username='$usersName' ");
  if (mysqli_num_rows($checkdata) > 0) {
    $valid['failed'] = true;
    $valid['messages'] = "Username Already Exist";
  }
  else {
    $sql = "INSERT INTO users (username, password, role, email) VALUES ('$usersName', '$usersConfirmPassword', '$usersRole', '$usersEmail') ";

  	if($connect->query($sql) === TRUE) {
  	 	$valid['success'] = true;
  		$valid['messages'] = "Data has been entered";
  	} else {
  	 	$valid['success'] = false;
  	 	$valid['messages'] = "Error while adding the members";
  	}
  }

	$connect->close();

	echo json_encode($valid);

} // /if $_POST
?>
