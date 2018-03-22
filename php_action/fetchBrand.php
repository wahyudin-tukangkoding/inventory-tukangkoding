<?php

require_once 'core.php';

$sql = "SELECT * FROM brands";
$result = $connect->query($sql);

$output = array('data' => array());

$nomor = 1;

if($result->num_rows > 0) {

 // $row = $result->fetch_array();
 $activeBrands = "";

 while($row = $result->fetch_array()) {
 	$brandId = $row[0];
 	// active
 	if($row[2] == 1) {
 		// activate member
 		$activeBrands = "<span class='badge badge-success'>Available</span>";
 	} else {
 		// deactivate member
 		$activeBrands = "<span class='badge badge-danger'>Not Available</span>";
 	}

 	$button = '<!-- Single button -->
	<div class="dropdown">
	  <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
     <button class="dropdown-item" data-toggle="modal" data-target="#editBrandsModal" onclick="editBrands('.$brandId.')"> <i class="fa fa-edit"></i> Edit</button>
     <button class="dropdown-item" data-toggle="modal" data-target="#removeBrandsModal" onclick="removeBrands('.$brandId.')"> <i class="fa fa-fw fa-trash"></i> Remove</button>
   </div>
	</div>';

 	$output['data'][] = array(
    $nomor++,
 		$row[1],
 		$activeBrands,
    $row['stock'],
 		$button
 		);
 } // /while

} // if num_rows

$connect->close();

echo json_encode($output);
