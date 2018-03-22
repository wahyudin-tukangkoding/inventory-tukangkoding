<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "inventory";

// db connection
$connect = new mysqli($host, $username, $password, $dbname);
// check connection
if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {
  //echo "Successfully connected";
}


 ?>
