<?php

require_once 'core.php';

$valid['success'] = array('success' => false, 'messages' => array());
$valid['failed'] = array('failed' => true, 'messages' => array());

if($_POST) {

	$editProductName = $_POST['editProductName'];
  $editProductsBrandName = $_POST['editProductsBrandName'];
	$editProductsCategoriesName = $_POST['editProductsCategoriesName'];
	$editPriceProduct = $_POST['editPriceProduct'];
	$editStockProduct = $_POST['editStockProduct'];
	$editProductStatus = $_POST['editProductStatus'];
  $productsId = $_POST['productsId'];

	$checkdata = mysqli_query($connect, "SELECT product_name FROM products WHERE product_name='$editProductName' ");
	if (mysqli_num_rows($checkdata) > 0) {
		$valid['failed'] = true;
		$valid['messages'] = "Product Already Exist";
	}
	$sql = "UPDATE products SET product_name = '$editProductName' ,brandID = '$editProductsBrandName', categoriesID = '$editProductsCategoriesName', quantity ='$editStockProduct', price = '$editPriceProduct', status = '$editProductStatus' WHERE productID = '$productsId'";

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
