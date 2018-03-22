<?php require_once 'includes/header_user.php'; ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Categories</li>
    </ol>

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-fw fa-tasks"></i>Categories
      </div>
      <div class="card-body">
        <div class="div-action pull pull-right" style="padding-bottom:20px;">
          <button class="btn btn-outline-dark" data-toggle="modal" data-target="#addCategories"> <i class="fa fa-plus fa-fw"></i> Add Categories </button>
        </div> <!-- /div-action -->

        <div class="table-responsive">
          <table class="table table-bordered table-stripped" id="manageCategoriesTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
              <tr>
                <th style="width:8%;">No</th>
                <th>Categories Name</th>
                <th>Status</th>
                <th style="width:15%;">Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>

      </div>
    </div>

    <!-- Add Categories -->
    <div class="modal fade" id="addCategories" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="form-horizontal" id="submitCategoriesForm" action="php_action/createCategories.php" method="post">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-plus fa-fw"></i>Add Categoriess</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div id="add-Categories-messages"></div>

              <div class="form-group">
                <input type="text" class="form-control" id="CategoriesName" name="CategoriesName" placeholder="Categories Name" autocomplete="off">
              </div>
              <div class="form-group">
                <select class="form-control" id="CategoriesStatus" name="CategoriesStatus">
                  <option value="">Status</option>
                  <option value="1">Available</option>
                  <option value="2">Not Available</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-dark" id="createCategoriesBtn" autocomplete="off">Save changes</button>
            </div>
          </form>
        </div>
      </div>
     </div>

     <!-- edit Categories -->
     <div class="modal fade" id="editCategories" tabindex="-1" role="dialog">
       <div class="modal-dialog">
         <div class="modal-content">

         	<form class="form-horizontal" id="editCategoriesForm" action="php_action/editCategories.php" method="POST">
     	      <div class="modal-header">
     	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Categories</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     	      </div>
     	      <div class="modal-body">

     	      	<div id="edit-Categories-messages"></div>

     		      <div class="edit-Categories-result">
     		      	<div class="form-group">
     					    <div class="col-sm-12">
     					      <input type="text" class="form-control" id="editCategoriesName" placeholder="Categories Name" name="editCategoriesName" autocomplete="off">
     					    </div>
     		        </div>
     		        <div class="form-group">
     					    <div class="col-sm-12">
     					      <select class="form-control" id="editCategoriesStatus" name="editCategoriesStatus">
     					      	<option value="">Status</option>
     					      	<option value="1">Available</option>
     					      	<option value="2">Not Available</option>
     					      </select>
     					    </div>
     		        </div> <!-- /form-group-->
     		      </div>
     		      <!-- /edit Categories result -->

     	      </div> <!-- /modal-body -->

     	      <div class="modal-footer editCategoriesFooter">
     	        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fa fa-fw fa-times"></i> Close</button>
     	        <button type="submit" class="btn btn-success" id="editCategoriesBtn" autocomplete="off"> <i class="fa fa-fw fa-check"></i> Save Changes</button>
     	      </div>
     	      <!-- /modal-footer -->
          	</form>
     	     <!-- /.form -->
         </div>
         <!-- /modal-content -->
       </div>
       <!-- /modal-dailog -->
     </div>
     <!-- / add modal -->
     <!-- /edit Categories -->

     <!-- remove Categories -->
     <div class="modal fade" tabindex="-1" role="dialog" id="removeMemberModal">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title"><i class="fa fa-fw fa-trash"></i> Remove Categories</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           </div>
           <div class="modal-body">
             <p>Do you really want to remove ?</p>
           </div>
           <div class="modal-footer removeCategoriesFooter">
             <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fa fa-fw fa-times"></i> Close</button>
             <button type="button" class="btn btn-outline-dark" id="removeCategoriesBtn"> <i class="fa fa-fw fa-check"></i> Save changes</button>
           </div>
         </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->
     <!-- /remove Categories -->

  </div>
</div>

<?php require_once 'includes/footer.php'; ?>
