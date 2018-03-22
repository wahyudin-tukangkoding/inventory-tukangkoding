<?php

require_once 'core.php';

$sql = "SELECT products.productID, products.product_name, products.brandID,
 		products.categoriesID, products.quantity, products.price, products.status,
 		brands.brand_name, categories.categories_name FROM products
		INNER JOIN brands ON products.brandID = brands.brandID
		INNER JOIN categories ON products.categoriesID = categories.categoriesID";

$result = $connect->query($sql);

$output = array('data' => array());
$x = 1;

if($result->num_rows > 0) {

 // $row = $result->fetch_array();
 $activeProduct = "";

 while($row = $result->fetch_array()) {
 	$productsId = $row[0];
 	// active
 	if($row[6] == 1) {
 		// activate member
 		$activeProduct = "<span class='badge badge-success'>Available</span>";
 	} else {
 		// deactivate member
 		$activeProduct = "<span class='badge badge-danger'>Not Available</span>";
 	} // /else

  $button = '<!-- Single button -->
  <div class="dropdown">
    <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Action <span class="caret"></span>
    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
     <button class="dropdown-item" data-toggle="modal" data-target="#editProductsModal" onclick="editProducts('.$productsId.')"> <i class="fa fa-edit"></i> Edit</button>
     <button class="dropdown-item" data-toggle="modal" data-target="#removeProductsModal" onclick="removeProducts('.$productsId.')"> <i class="fa fa-fw fa-trash"></i> Remove</button>
   </div>
  </div>';

  $brand = $row[7];
  $categories = $row[8];

 	$output['data'][] = array(
    $x++,
 		// product name
 		$row[1],
 		// rate
 		$brand,
 		// quantity
 		$categories,
    $row[5],
 		// brand
 		$row[4],
 		// button
    $activeProduct,
    $button
 		);
 } // /while

}// if num_rows

$connect->close();

echo json_encode($output);
