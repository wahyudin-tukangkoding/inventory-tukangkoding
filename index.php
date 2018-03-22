<?php
require_once 'php_action/db_connect.php';

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

if(isset($_POST['login'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	if(empty($username) || empty($password)) {
		if($username == "") {
			$errors[] = "Username is required";
		}

		if($password == "") {
			$errors[] = "Password is required";
		}
	}
	else {
		$sql = "SELECT * FROM users WHERE username = '$username'";
		$result = $connect->query($sql);

		if($result->num_rows == 1) {
			// exists
			$mainSql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$mainResult = $connect->query($mainSql);

			if($mainResult->num_rows == 1) {
				$value = $mainResult->fetch_assoc();
				$role = $value['role'];
				$user = $value['username'];
				$id = $value['userID'];

				// set session
				$_SESSION['role_level'] = $role;
				$_SESSION['user'] = $user;
				$_SESSION['id'] = $id;
				if ($_SESSION['role_level'] == "admin") {
						header('location: dashboard_admin.php');
				}
				else if ($_SESSION['role_level'] == "user") {
						header('location: dashboard_user.php');
				}
				else {
						header('location: dashboard_guest.php');
				}

			}
			else{
				$errors[] = "Incorrect username/password combination";
			} // /else
		}
		else {
			$errors[] = "Username does not exists";
		} // /else
	} // /else not empty username // password

} // /if $_POST
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Login</title>

		<!-- Bootstrap core CSS-->
	  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	  <!-- Custom fonts for this template-->
	  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	  <!-- Page level plugin CSS-->
	  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	  <!-- Custom styles for this template-->
	  <link href="css/sb-admin.css" rel="stylesheet">

  </head>
  <body class="bg-dark">
    <div class="container">
      <div class="row">
        <div class="card card-login mx-auto mt-5 col-md-4">
          <div class="card-header"><i class="fa fa-user"></i>    Please Sign In</div>
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
              ?>
            </div>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
             <div class="form-group">
               <label for="username">Username</label>
               <input class="form-control" type="text" id="username" name="username" placeholder="Enter Username" autocomplete="off">
             </div>
             <div class="form-group">
               <label for="password">Password</label>
               <input class="form-control" type="password" id="password" name="password" placeholder="Enter password"  autocomplete="off">
             </div>
             <div class="form-group">
               <button type="submit" class="btn btn-outline-dark" name="login"> <i class="fa fa-sign-in"></i> Sign in</button>
							 <a href="register.php" class="btn btn-outline-dark" > <i class="fa fa-plus"></i> Register To View</a>
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
