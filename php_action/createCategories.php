<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$valid['failed'] = array('failed' => false, 'messages' => array());

if($_POST) {

	$CategoriesName = $_POST['CategoriesName'];
  $CategoriesStatus = $_POST['CategoriesStatus'];

	$checkdata = mysqli_query($connect, "SELECT categories_name FROM categories WHERE categories_name='$CategoriesName' ");
  if (mysqli_num_rows($checkdata) > 0) {
    $valid['failed'] = true;
    $valid['messages'] = "Category Already Exist";
  }
	else {
		$sql = "INSERT INTO categories (categories_name, status) VALUES ('$CategoriesName', '$CategoriesStatus')";

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
