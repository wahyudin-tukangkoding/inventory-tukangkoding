<?php require_once 'php_action/db_connect.php';
session_start();

if(isset($_SESSION['role_level'])) {
	if ($_SESSION['role_level'] == "admin") {
			header('location: http://localhost/inventory/dashboard_admin.php');
	}
	else if ($_SESSION['role_level'] == "user") {
			header('location: http://localhost/inventory/dashboard_user.php');
	}
	else if ($_SESSION['role_level'] == "guest") {
			header('location: http://localhost/inventory/dashboard_guest.php');
	}
	// header('location: http://localhost/inventory/dashboard_admin.php');
}

?>

<?php

$errors = array();
$succes = array();

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = $_POST['username'];
  $email = $_POST['email'];

  $checkdata = mysqli_query($connect, "SELECT username FROM users WHERE username='$username' ");
  if (mysqli_num_rows($checkdata) > 0) {
    $errors[] = "Username already exists";
  }
  else {
    $result = mysqli_query($connect, "INSERT INTO users (username, password, role, email) VALUES('$username', '$password', 'guest', '$email')");

  }
  $succes[] = "Data succesfully entered";
}

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

     <title>Register</title>

		 <!-- Bootstrap core CSS-->
 	  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
 	  <!-- Custom fonts for this template-->
 	  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
 	  <!-- Page level plugin CSS-->
 	  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
 	  <!-- Custom styles for this template-->
 	  <link href="css/sb-admin.css" rel="stylesheet">

    <script type="text/javascript">
        function ValidatePassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirm_password").value;
            if (password != confirmPassword) {
                confirm_password.setCustomValidity("Passwords don't match");
            }
            else {
              confirm_password.setCustomValidity('');
            }

            password.onchange = ValidatePassword;
            confirm_password.onkeyup = ValidatePassword;
        }
    </script>

   </head>
   <body class="bg-dark">
     <div class="container">
       <div class="row">
         <div class="card card-login mx-auto mt-5 col-md-4">
           <div class="card-header"><i class="fa fa-users"></i>    Register</div>
           <div class="card-body">
             <div class="message">
               <?php
                 if ($errors) {
                   foreach ($errors as $key => $value) {
                     echo '
                     <div class="alert alert-warning alert-dismissible fade show" role="alert">
                       <i class="fa fa-exclamation-triangle"></i>   '.$value.'
											 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
                     </div>
                     ';
                   }
                 }
                 else if($succes){
                    foreach ($succes as $key => $succes_value) {
                      echo '
                      <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fa fa-check fa-fw"></i> '.$succes_value.'
												<button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
                      </div>
                      ';
                    }
                  }
               ?>
             </div>
             <form action="register.php" method="post">
              <div class="form-group">
                <label for="username">Username</label>
                <input class="form-control" type="text" id="username" name="username" placeholder="Enter Username" autocomplete="off" required="required" autofocus>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Enter password"  autocomplete="off" required="required" autofocus>
              </div>
              <div class="form-group">
                <label for="password">Confirm Password</label>
                <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="Enter your password"  autocomplete="off" required="required"  autofocus>
              </div>
              <div class="form-group">
                <label for="password">Email</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Enter your email"  autocomplete="off" required="required" autofocus>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-outline-dark" name="register" onclick="return ValidatePassword()"> <i class="fa fa-sign-in"></i> Register</button>
 							  <button type="reset" class="btn btn-outline-dark" > <i class="fa fa-minus"></i> Reset</button>
                <a href="index.php" class="btn btn-outline-danger"> <i class="fa fa-close"></i>  Close</a>
              </div>
            </form>
           </div>
         </div>
       </div>
     </div>


		 <!-- Bootstrap core JavaScript-->
     <script src="vendor/jquery/jquery.min.js"></script>
     <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
     <!-- Core plugin JavaScript-->
     <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
     <!-- Page level plugin JavaScript-->
     <script src="vendor/chart.js/Chart.min.js"></script>
     <script src="vendor/datatables/jquery.dataTables.js"></script>
     <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
     <!-- Custom scripts for all pages-->
     <script src="js/sb-admin.min.js"></script>
     <!-- Custom scripts for this page-->
     <script src="js/sb-admin-datatables.min.js"></script>
     <script src="js/sb-admin-charts.min.js"></script>
   </body>
 </html>
