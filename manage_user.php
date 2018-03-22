<?php require_once 'includes/header_admin.php'; ?>

<div class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs -->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php">Home</a>
			</li>
      <li class="breadcrumb-item">Account</li>
			<li class="breadcrumb-item active">Manage Users</li>
		</ol>

		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-edit fa-fw"></i>Manage Users
			</div>
			<div class="card-body">
				<div class="div-action pull pull-right" style="padding-bottom:20px">
					<button class="btn btn-outline-dark" data-toggle="modal" data-target="#addUsers"><i class="fa fa-plus fa-fw"></i>Add User </button>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered table-stripped" id="manageUsersTables" width="100%" cellspacing="0">
						<thead class="thead-dark">
							<tr>
								<th style="width:5%;">No</th>
								<th>Username</th>
								<th>Role</th>
								<th>Email</th>
								<th style="width:10%;">Action</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>


		<!-- Add Products -->
		<div class="modal fade" id="addUsers" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="form-horizontal" id="submitUsersForm" action="php_action/createUsers.php" method="post">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-plus fa-fw"></i>Add Users</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="add-users-messages"></div>
              <div class="form-group">
                <input type="text" class="form-control" id="usersName" name="usersName" placeholder="Username" autocomplete="off">
              </div>
							<div class="form-group">
                <input type="password" class="form-control" id="usersPassword" name="usersPassword" placeholder="Password" autocomplete="off">
							</div>
							<div class="form-group">
                <input type="password" class="form-control" id="usersConfirmPassword" name="usersConfirmPassword" placeholder="Confirm Password" autocomplete="off">
							</div>
              <div class="form-group">
                <select class="form-control" id="usersRole" name="usersRole">
                  <option value="">Role</option>
                  <option disabled>Admin</option>
                  <option value="user">User</option>
                  <option value="guest">Guest</option>
                </select>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" id="usersEmail" name="usersEmail" placeholder="Email" autocomplete="off">
              </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-dark" id="createUsersBtn" autocomplete="off">Save changes</button>
            </div>
          </form>
        </div>
      </div>
		</div>
  </div> <!-- END ADD PROUDCT MODAL -->

		<!-- Edit Products -->
  <div class="modal fade" id="editUsers" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form class="form-horizontal" id="editUsersForm" action="php_action/editUser.php" method="post">
          <div class="modal-header">
            <h5 class="modal-title"><i class="fa fa-edit fa-fw"></i>Edit Users</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div id="edit-users-messages"></div>
            <div class="form-group">
              <input type="text" class="form-control" id="editUsersName" name="editUsersName" placeholder="Username" autocomplete="off">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="editUsersPassword" name="editUsersPassword" placeholder="Password" autocomplete="off">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" id="editUsersConfirmPassword" name="editUsersConfirmPassword" placeholder="Confirm Password" autocomplete="off">
            </div>
            <div class="form-group">
              <select class="form-control" id="editUsersRole" name="editUsersRole">
                <option value="">Role</option>
                <option value="admin" disabled>Admin</option>
                <option value="user">User</option>
                <option value="guest">Guest</option>
              </select>
            </div>
            <div class="form-group editUsersFooter">
              <input type="text" class="form-control" id="editUsersEmail" name="editUsersEmail" placeholder="Email" autocomplete="off">
            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-dark" id="editUsersBtn" autocomplete="off">Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

		<!-- Remove Products  -->
		<div class="modal fade" tabindex="-1" role="dialog" id="removeUsers">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><i class="fa fa-fw fa-trash"></i> Remove User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<p>Do you really want to remove ?</p>
					</div>
					<div class="modal-footer removeUsersFooter">
						<button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fa fa-fw fa-times"></i> Close</button>
						<button type="button" class="btn btn-outline-dark" id="removeUsersBtn"> <i class="fa fa-fw fa-check"></i> Save changes</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

	</div>
</div>

<?php require_once 'includes/footer.php'; ?>
