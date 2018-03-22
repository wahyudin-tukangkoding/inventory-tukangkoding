<?php require_once 'includes/header_admin.php'; ?>

<div class="content-wrapper">
	<div class="container-fluid">
		<!-- Breadcrumbs -->
		<ol class="breadcrumb">
			<li class="breadcrumb-item">
				<a href="index.php">Home</a>
			</li>
			<li class="breadcrumb-item active">Products</li>
		</ol>

		<div class="card mb-3">
			<div class="card-header">
				<i class="fa fa-product-hunt fa-fw"></i>Products
			</div>
			<div class="card-body">
				<div class="div-action pull pull-right" style="padding-bottom:20px">
					<button class="btn btn-outline-dark" data-toggle="modal" data-target="#addProducts"><i class="fa fa-plus fa-fw"></i>Add Products </button>
				</div>

				<div class="table-responsive">
					<table class="table table-bordered table-stripped" id="manageProductsTables" width="100%" cellspacing="0">
						<thead class="thead-dark">
							<tr>
								<th style="width:5%;">No</th>
								<th>Product Name</th>
								<th>Brand Name</th>
								<th>Categories Name</th>
								<th>Price</th>
								<th>Stock</th>
								<th>Status</th>
								<th style="width:10%;">Action</th>
							</tr>
						</thead>
					</table>
				</div>

			</div>
		</div>


		<!-- Add Products -->
		<div class="modal fade" id="addProducts" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="form-horizontal" id="submitProductsForm" action="php_action/createProduct.php" method="post">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-plus fa-fw"></i>Add Products</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="add-products-messages"></div>
              <div class="form-group">
                <input type="text" class="form-control" id="productName" name="productName" placeholder="Product Name" autocomplete="off">
              </div>
							<div class="form-group">
								<select class="form-control" id="brandName" name="brandName">
									<option value="">Brand Name</option>
									<?php
										$sql = "SELECT brandID, brand_name, brand_active FROM brands WHERE brand_active = 1";
										$brandResult = $connect->query($sql);
										while($row = $brandResult->fetch_array()){
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" id="categoriesName" name="categoriesName">
									<option value="">Categories Name</option>
									<?php
										$sql = "SELECT categoriesID, categories_name, status FROM categories WHERE status = 1";
										$categoriesResult = $connect->query($sql);
										while($row = $categoriesResult->fetch_array()){
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										}
									?>
								</select>
							</div>
              <div class="form-group">
                <input type="text" class="form-control" id="price" name="price" placeholder="Price" autocomplete="off">
              </div>
							<div class="form-group">
								<input type="text" class="form-control" id="stock" name="stock" placeholder="Stock" autocomplete="off">
              </div>
              <div class="form-group">
                <select class="form-control" id="productStatus" name="productStatus">
                  <option value="">Status</option>
                  <option value="1">Available</option>
                  <option value="2">Not Available</option>
                </select>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-dark" id="createProductsBtn" autocomplete="off">Save changes</button>
            </div>
          </form>
        </div>
      </div>
		</div> <!-- END ADD PROUDCT MODAL -->

		<!-- Edit Products -->
		<div class="modal fade" id="editProductsModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <form class="form-horizontal" id="editProductsForm" action="php_action/editProduct.php" method="post">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fa fa-edit fa-fw"></i>Edit Products</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <div id="edit-products-messages"></div>
              <div class="form-group">
                <input type="text" class="form-control" id="editProductName" name="editProductName" placeholder="Product Name" autocomplete="off">
              </div>
							<div class="form-group">
								<select class="form-control" id="editProductsBrandName" name="editProductsBrandName">
									<option value="">Brand Name</option>
									<?php
										$sql = "SELECT brandID, brand_name, brand_active FROM brands WHERE brand_active = 1";
										$brandResult = $connect->query($sql);
										while($row = $brandResult->fetch_array()){
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										}
									?>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control" id="editProductsCategoriesName" name="editProductsCategoriesName">
									<option value="">Categories Name</option>
									<?php
										$sql = "SELECT categoriesID, categories_name, status FROM categories WHERE status = 1";
										$categoriesResult = $connect->query($sql);
										while($row = $categoriesResult->fetch_array()){
											echo "<option value='".$row[0]."'>".$row[1]."</option>";
										}
									?>
								</select>
							</div>
              <div class="form-group">
                <input type="text" class="form-control" id="editPriceProduct" name="editPriceProduct" placeholder="Price" autocomplete="off">
              </div>
							<div class="form-group">
								<input type="text" class="form-control" id="editStockProduct" name="editStockProduct" placeholder="Stock" autocomplete="off">
              </div>
              <div class="form-group">
                <select class="form-control" id="editProductStatus" name="editProductStatus">
                  <option value="">Status</option>
                  <option value="1">Available</option>
                  <option value="2">Not Available</option>
                </select>
              </div>
            </div>
            <div class="modal-footer editProductsFooter">
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-outline-dark" id="editProductsBtn" autocomplete="off">Save changes</button>
            </div>
          </form>
        </div>
      </div>
		</div> <!-- END EDIT Products -->

		<!-- Remove Products  -->
		<div class="modal fade" tabindex="-1" role="dialog" id="removeProductsModal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title"><i class="fa fa-fw fa-trash"></i> Remove Product</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<p>Do you really want to remove ?</p>
					</div>
					<div class="modal-footer removeProductsFooter">
						<button type="button" class="btn btn-outline-danger" data-dismiss="modal"> <i class="fa fa-fw fa-times"></i> Close</button>
						<button type="button" class="btn btn-outline-dark" id="removeProductsBtn"> <i class="fa fa-fw fa-check"></i> Save changes</button>
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->

	</div>
</div>

<?php require_once 'includes/footer.php'; ?>
