<?php

require_once 'core.php';

$CategoriesId = $_POST['CategoriesId'];

$sql = "SELECT * FROM categories WHERE categoriesID = $CategoriesId";
$result = $connect->query($sql);

if($result->num_rows > 0) {
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);
