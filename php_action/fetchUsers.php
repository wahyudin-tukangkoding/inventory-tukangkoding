<?php

require_once 'core.php';

$sql = "SELECT * FROM users";
$result = $connect->query($sql);

$output = array('data' => array());

$nomor = 1;

if($result->num_rows > 0) {

 // $row = $result->fetch_array();
 $usersId = "";

 while($row = $result->fetch_array()) {
 	$usersId = $row[0];
 	// active
  $action ='';
  $role = $row[3];
  if ($role == "admin") {
    $action = ' <span class="badge badge-success">Admin</span>';
  }
  else {
    $action = '<!-- Single button -->
  	<div class="dropdown">
  	  <button type="button" class="btn btn-outline-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
  	    Action <span class="caret"></span>
  	  </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
       <button class="dropdown-item" data-toggle="modal" data-target="#editUsers" onclick="editUsers('.$usersId.')"> <i class="fa fa-edit"></i> Edit</button>
       <button class="dropdown-item" data-toggle="modal" data-target="#removeUsers" onclick="removeUsers('.$usersId.')"> <i class="fa fa-fw fa-trash"></i> Remove</button>
     </div>
  	</div>';
  }


 	$output['data'][] = array(
    $nomor++,
 		$row[1],
    $role,
    $row[4],
    $action
 		);
 } // /while

} // if num_rows

$connect->close();

echo json_encode($output);
