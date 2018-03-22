<?php

require_once 'core.php';

$usersId = $_POST['usersId'];

$sql = "SELECT * FROM users WHERE userID = $usersId";
$result = $connect->query($sql);

if($result->num_rows > 0) {
 $row = $result->fetch_array();
} // if num_rows

$connect->close();

echo json_encode($row);
