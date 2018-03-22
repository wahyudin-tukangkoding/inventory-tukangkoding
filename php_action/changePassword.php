<?php

require_once 'core.php';

if($_POST) {

	$valid['success'] = array('success' => false, 'messages' => array());

	$currentPassword = $_POST['password'];
	$newPassword = $_POST['npassword'];
	$confirmPassword = $_POST['cpassword'];
	$userId = $_SESSION['id'];

	$sql ="SELECT * FROM users WHERE userID = {$userId}";
	$query = $connect->query($sql);
	$result = $query->fetch_assoc();

	if($currentPassword == $result['password']) {

		if($newPassword == $confirmPassword) {

			$updateSql = "UPDATE users SET password = '$newPassword' WHERE userID = {$userId}";
			if($connect->query($updateSql) === TRUE) {
				$valid['success'] = true;
				$valid['messages'] = "Successfully Updated";
			} else {
				$valid['success'] = false;
				$valid['messages'] = "Error while updating the password";
			}

		}
		else {
			$valid['success'] = false;
			$valid['messages'] = "New password does not match with Confirm password";
		}

	} else {
		$valid['success'] = false;
		$valid['messages'] = "Current password is incorrect";
	}

	$connect->close();

	echo json_encode($valid);

}

?>
