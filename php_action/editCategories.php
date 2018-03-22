<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$valid['failed'] = array('failed' => true, 'messages' => array());

if($_POST) {

	$CategoriesName = $_POST['editCategoriesName'];
  $CategoriesStatus = $_POST['editCategoriesStatus'];
  $CategoriesId = $_POST['CategoriesId'];

	$checkdata = mysqli_query($connect, "SELECT categories_name FROM categories WHERE categories_name='$brandName' ");
	if (mysqli_num_rows($checkdata) > 0) {
		$valid['failed'] = true;
		$valid['messages'] = "Category Already Exist";
	}
	$sql = "UPDATE categories SET categories_name = '$CategoriesName', status = '$CategoriesStatus' WHERE CategoriesID = '$CategoriesId'";

	if($connect->query($sql) === TRUE) {
	 	$valid['success'] = true;
		$valid['messages'] = "Successfully Updated";
	} else {
	 	$valid['success'] = false;
	 	$valid['messages'] = "Error while adding the members";
	}

	$connect->close();

	echo json_encode($valid);

} // /if $_POST
