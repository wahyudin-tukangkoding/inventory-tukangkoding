<?php

require_once 'core.php';

if($_POST) {

	$valid['success'] = array('success' => false, 'messages' => array());

	$username = $_POST['username'];
	$userId = $_SESSION['id'];

	$checkdata = mysqli_query($connect, "SELECT username FROM users WHERE username='$username' ");
  if (mysqli_num_rows($checkdata) > 0) {
		$valid['success'] = false;
		$valid['messages'] = "Username Already Exists";
  }
	else {
		$sql = "UPDATE users SET username = '$username' WHERE userID = {$userId}";
		if($connect->query($sql) === TRUE) {
			$valid['success'] = true;
			$valid['messages'] = "Successfully Update";
		} else {
			$valid['success'] = false;
			$valid['messages'] = "Error while updating product info";
		}
	}



	$connect->close();

	echo json_encode($valid);

}

?>
