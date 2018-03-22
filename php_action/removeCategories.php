<?php

require_once 'core.php';


$valid['success'] = array('success' => false, 'messages' => array());

$CategoriesId = $_POST['CategoriesId'];

if($CategoriesId) {

 $sql = "DELETE FROM categories WHERE categories . categoriesID = {$CategoriesId}";

 if($connect->query($sql) === TRUE) {
 	$valid['success'] = true;
	$valid['messages'] = "Successfully Removed";
 } else {
 	$valid['success'] = false;
 	$valid['messages'] = "Error while remove the Categories";
 }

 $connect->close();

 echo json_encode($valid);

} // /if $_POST
