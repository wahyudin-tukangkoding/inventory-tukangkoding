<?php require_once 'includes/header_admin.php'; ?>

<div class="content-wrapper">
  <div class="container-fluid">
    <!-- Breadcrumbs-->
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.php">Home</a>
      </li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>

    <div class="table-responsive">
      <table class="table table-bordered table-stripped" id="manageProductsTables" width="100%" cellspacing="0">
        <thead class="thead-dark">
          <tr>
            <th style="width:5;">No</th>
            <th>Product Name</th>
            <th>Brand Name</th>
            <th>Categories Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Status</th>
          </tr>
        </thead>
      </table>
    </div>
    <br><br>
    <div class="row">
      <div class="col-sm-6">
        <div class="table-responsive">
          <table class="table table-bordered table-stripped" id="manageBrandTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
              <tr>
                <th style="width:8%;">No</th>
                <th>Brand Name</th>
                <th>Status</th>
                <th>Stock</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>

      <div class="col-sm-6">
        <div class="table-responsive">
          <table class="table table-bordered table-stripped" id="manageCategoriesTable" width="100%" cellspacing="0">
            <thead class="thead-dark">
              <tr>
                <th style="width:8%;">No</th>
                <th>Categories Name</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </div>
</div>

<?php require_once 'includes/footer.php'; ?>
