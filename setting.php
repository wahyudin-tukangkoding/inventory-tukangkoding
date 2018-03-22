<?php require_once 'includes/header_user.php'; ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <nav aria-label="breadcrumb" role="navigation">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item">Account</li>
            <li class="breadcrumb-item active" aria-current="page">Setting</li>
          </ol>
        </nav>

        <div class="card">
          <div class="card-header">
            <i class="fa fa-wrench fa-fw"></i> Setting
          </div>
          <div class="card-body">
            <form class="form-horizontal" action="php_action/changeUsername.php" method="post" id="changeUsernameForm">
              <fieldset>
                <legend>Change Username</legend>
                <hr>
                <div class="changeUsernameMessages"></div>

                <div class="form-group">
    					    <label for="username" class="col-sm-2 control-label">Username</label>
    					    <div class="col-sm-10">
    					      <input type="text" class="form-control" id="username" name="username" placeholder="Username" autocomplete="off" value="<?php echo $_SESSION['user']; ?>"/>
    					    </div>
    					  </div>

    					  <div class="form-group">
    					    <div class="col-sm-offset-2 col-sm-10">
    					    	<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['id'] ?>" />
    					      <button type="submit" class="btn btn-success" id="changeUsernameBtn"> <i class="fa fa-check-circle fa-fw" ></i> Save Changes </button>
    					    </div>
    					  </div>
              </fieldset>
            </form>

            <form class="form-horizontal" action="php_action/changePassword.php" method="post" id="changePasswordForm">
              <fieldset>
    						<legend>Change Password</legend>
                <hr>
                <div class="changePasswordMessages"></div>
    						<div class="form-group">
    					    <label for="password" class="col-sm-2 control-label">Current Password</label>
    					    <div class="col-sm-10">
    					      <input type="password" class="form-control" id="password" name="password" placeholder="Current Password">
    					    </div>
    					  </div>

    					  <div class="form-group">
    					    <label for="npassword" class="col-sm-2 control-label">New password</label>
    					    <div class="col-sm-10">
    					      <input type="password" class="form-control" id="npassword" name="npassword" placeholder="New Password">
    					    </div>
    					  </div>

    					  <div class="form-group">
    					    <label for="cpassword" class="col-sm-2 control-label">Confirm Password</label>
    					    <div class="col-sm-10">
    					      <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="Confirm Password">
    					    </div>
    					  </div>
    					  <div class="form-group">
    					    <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['id'] ?>" />
    					      <button type="submit" class="btn btn-primary"> <i class="fa fa-check-circle fa-fw"></i> Save Changes </button>
    					    </div>
    					  </div>
    					</fieldset>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>

<?php require_once 'includes/footer.php';?>
