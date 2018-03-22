<?php

session_start();

require_once 'db_connect.php';
// echo $_SESSION['role_level'];

if(!$_SESSION['role_level']) {
	header('location: http://localhost/inventory/index.php');
}


?>
