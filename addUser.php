<?php require_once 'includes/header_admin.php'; ?>

<?php

$errors = array();
$succes = array();

if (isset($_POST['addUser'])) {
  $username = $_POST['username'];
  $password = $_POST['username'];
  $email = $_POST['email'];

  $checkdata = mysqli_query($connect, "SELECT username FROM users WHERE username='$username' ");
  if (mysqli_num_rows($checkdata) > 0) {
    $errors[] = "Username already exists";
  }
  else {
    $result = mysqli_query($connect, "INSERT INTO users (username, password, role, email) VALUES('$username', '$password', 'user', '$email')");


  }
  $succes[] = "Data succesfully entered";
}

 ?>

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
<div class="content-wrapper">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Account</li>
            <li class="breadcrumb-item active" aria-current="page">Add User</li>
          </ol>
        </nav>

        <div class="card">
          <div class="card-header">
            <i class="fa fa-plus fa-fw"></i> Add User
          </div>
          <div class="card-body">
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
              <form action="addUser.php" method="post">
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
                 <button type="submit" class="btn btn-outline-dark" name="addUser" onclick="return ValidatePassword()"> <i class="fa fa-user fa-fw"></i> Add User</button>
                 <button type="reset" class="btn btn-outline-dark" > <i class="fa fa-minus"></i> Reset</button>
               </div>
             </form>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php require_once 'includes/footer.php'; ?>
