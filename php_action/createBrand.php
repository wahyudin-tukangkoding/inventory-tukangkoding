<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$valid['failed'] = array('failed' => false, 'messages' => array());

if($_POST) {

	$brandName = $_POST['brandName'];
  $brandStatus = $_POST['brandStatus'];
	$brandStock = $_POST['brandStock'];

	$checkdata = mysqli_query($connect, "SELECT brand_name FROM brands WHERE brand_name='$brandName' ");
	if (mysqli_num_rows($checkdata) > 0) {
		$valid['failed'] = true;
		$valid['messages'] = "Brand Already Exist";
	}
	else {
		$sql = "INSERT INTO brands (brand_name, brand_active, stock) VALUES ('$brandName', '$brandStatus', '$brandStock')";

		if($connect->query($sql) === TRUE) {
		 	$valid['success'] = true;
			$valid['messages'] = "Successfully Added";
		} else {
		 	$valid['success'] = false;
		 	$valid['messages'] = "Error while adding the members";
		}
	}

	$connect->close();

	echo json_encode($valid);

} // /if $_POST

?>
