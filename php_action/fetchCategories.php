<?php

require_once 'core.php';

$sql = "SELECT * FROM categories";
$result = $connect->query($sql);

$output = array('data' => array());

$nomor = 1;

if($result->num_rows > 0) {

 // $row = $result->fetch_array();
 $activeCategories = "";

 while($row = $result->fetch_array()) {
 	$CategoriesId = $row[0];
 	// active
 	if($row[2] == 1) {
 		// activate member
 		$activeCategories = "<span class='badge badge-success'>Available</span>";
 	} else {
 		// deactivate member
 		$activeCategories = "<span class='badge badge-danger'>Not Available</span>";
 	}

 	$button = '<!-- Single button -->
	<div class="dropdown">
	  <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    Action <span class="caret"></span>
	  </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
     <button class="dropdown-item" data-toggle="modal" data-target="#editCategories" onclick="editCategories('.$CategoriesId.')"> <i class="fa fa-edit"></i> Edit</button>
     <button class="dropdown-item" data-toggle="modal" data-target="#removeMemberModal" onclick="removeCategories('.$CategoriesId.')"> <i class="fa fa-fw fa-trash"></i> Remove</button>
   </div>
	</div>';

 	$output['data'][] = array(
    $nomor++,
 		$row[1],
 		$activeCategories,
 		$button
 		);
 } // /while

} // if num_rows

$connect->close();

echo json_encode($output);
