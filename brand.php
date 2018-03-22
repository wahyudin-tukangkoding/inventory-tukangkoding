<?php require_once 'includes/header_user.php'; ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Brand</li>
    </ol>

    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-btc fa-fw"></i>Brand
      </div>
      <div class="card-body">
        <div class="div-action pull pull-right" style="padding-bottom:20px;">
          <button class="btn btn-outline-dark" data-toggle="modal" data-target="#addBrand"> <i class="fa fa-plus fa-fw"></i> Add Brand </button>
        </div> <!-- /div-action -->

        <div class="table-responsive">
          <table class="table table-bordered table-stripped" id="manageBrandTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
              <tr>
                <th style="width:8%;">No</th>
                <th>Brand Name</th>
                <th>Status</th>
                <th>Stock</th>
                <th style="width:15%;">Action</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>

      </div>
    </div>

    <!-- Add Brand -->
    <div class="modal fade" id="addBrand" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="form-horizontal" id="submitBrandForm" action="php_action/createBrand.php" method="post">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-plus fa-fw"></i>Add Brands</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <div id="add-brand-messages"></div>

              <div class="form-group">
                <input type="text" class="form-control" id="brandName" name="brandName" placeholder="Brand Name" autocomplete="off">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="brandStock" name="brandStock" placeholder="Stock" autocomplete="off">
              </div>
              <div class="form-group">
                <select class="form-control" id="brandStatus" name="brandStatus">
                  <option value="">Status</option>
                  <option value="1">Available</option>
                  <option value="2">Not Available</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-dark" id="createBrandBtn" autocomplete="off">Save changes</button>
            </div>
          </form>
        </div>
      </div>
     </div>

     <!-- edit brand -->
     <div class="modal fade" id="editBrandsModal" tabindex="-1" role="dialog">
       <div class="modal-dialog">
         <div class="modal-content">

         	<form class="form-horizontal" id="editBrandForm" action="php_action/editBrand.php" method="POST">
     	      <div class="modal-header">
     	        <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Brand</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
     	      </div>
     	      <div class="modal-body">

     	      	<div id="edit-brand-messages"></div>

     		      <div class="edit-brand-result">
     		      	<div class="form-group">
     					    <div class="col-sm-12">
     					      <input type="text" class="form-control" id="editBrandName" placeholder="Brand Name" name="editBrandName" autocomplete="off">
     					    </div>
     		        </div>
                <div class="form-group">
                  <div class="col-sm-12">
                    <input type="text" class="form-control" id="editBrandStock" name="editBrandStock" placeholder="Stock" autocomplete="off">
                  </div>
                </div> <!-- /form-group-->
     		        <div class="form-group">
     					    <div class="col-sm-12">
     					      <select class="form-control" id="editBrandStatus" name="editBrandStatus">
     					      	<option value="">Status</option>
     					      	<option value="1">Available</option>
     					      	<option value="2">Not Available</option>
     					      </select>
     					    </div>
     		        </div> <!-- /form-group-->
     		      </div>
     		      <!-- /edit brand result -->

     	      </div> <!-- /modal-body -->

     	      <div class="modal-footer editBrandFooter">
     	        <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fa fa-fw fa-times"></i> Close</button>
     	        <button type="submit" class="btn btn-success" id="editBrandBtn" autocomplete="off"> <i class="fa fa-fw fa-check"></i> Save Changes</button>
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
     <!-- /edit brand -->

     <!-- remove brand -->
     <div class="modal fade" tabindex="-1" role="dialog" id="removeBrandsModal">
       <div class="modal-dialog">
         <div class="modal-content">
           <div class="modal-header">
             <h4 class="modal-title"><i class="fa fa-fw fa-trash"></i> Remove Brand</h4>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
           </div>
           <div class="modal-body">
             <p>Do you really want to remove ?</p>
           </div>
           <div class="modal-footer removeBrandFooter">
             <button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fa fa-fw fa-times"></i> Close</button>
             <button type="button" class="btn btn-outline-dark" id="removeBrandBtn"> <i class="fa fa-fw fa-check"></i> Save changes</button>
           </div>
         </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
     </div><!-- /.modal -->
     <!-- /remove brand -->

  </div>
</div>

<?php require_once 'includes/footer.php'; ?>
