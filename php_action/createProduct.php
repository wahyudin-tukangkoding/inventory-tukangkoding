<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$valid['failed'] = array('failed' => false, 'messages' => array());

if($_POST) {

	$productName = $_POST['productName'];
  $brandName = $_POST['brandName'];
	$categoriesName = $_POST['categoriesName'];
  $price = $_POST['price'];
  $stock = $_POST['stock'];
	$productStatus = $_POST['productStatus'];

	$checkdata = mysqli_query($connect, "SELECT product_name FROM products WHERE product_name='$productName' ");
  if (mysqli_num_rows($checkdata) > 0) {
    $valid['failed'] = true;
    $valid['messages'] = "Product Already Exist";
  }
	else {
		$sql = "INSERT INTO products (product_name, brandID, categoriesID, price, quantity, status) VALUES ('$productName', '$brandName', '$categoriesName', '$price', '$stock', '$productStatus')";

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
