<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$valid['failed'] = array('failed' => true, 'messages' => array());

if($_POST) {

	$brandName = $_POST['editBrandName'];
  $brandStatus = $_POST['editBrandStatus'];
	$brandStock = $_POST['editBrandStock'];
  $brandId = $_POST['brandId'];

	$checkdata = mysqli_query($connect, "SELECT brand_name FROM brands WHERE brand_name='$brandName' ");
	if (mysqli_num_rows($checkdata) > 0) {
		$valid['failed'] = true;
		$valid['messages'] = "Brand Already Exist";
	}
	else {
		$sql = "UPDATE brands SET brand_name = '$brandName' ,brand_active = '$brandStatus', stock = '$brandStock' WHERE brandID = '$brandId'";

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

?>
