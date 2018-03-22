var manageProductsTables;

$(document).ready(function() {
	// top bar active
	$('#navProducts').addClass('active');

	// manage Products table
	manageProductsTables = $("#manageProductsTables").DataTable({
		'ajax': 'php_action/fetchProduct.php',
		'order': []
	});

	// submit Products form function
	$("#submitProductsForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		var productName = $("#productName").val();
		var brandName = $("#brandName").val();
		var categoriesName = $("#categoriesName").val();
		var price = $("#price").val();
		var stock = $("#stock").val();
		var productStatus = $("#productStatus").val();

		if(productName == "") {
			$("#productName").after('<p class="text-danger">Product Name field is required</p>');
			$('#productName').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#productName").find('.text-danger').remove();
			// success out for form
			$("#productName").closest('.form-group').addClass('has-success');
		}

		if(brandName == "") {
			$("#brandName").after('<p class="text-danger">Brand Name field is required</p>');
			$('#brandName').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#brandName").find('.text-danger').remove();
			// success out for form
			$("#brandName").closest('.form-group').addClass('has-success');
		}

		if(categoriesName == "") {
			$("#categoriesName").after('<p class="text-danger">Categories Name field is required</p>');

			$('#categoriesName').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#categoriesName").find('.text-danger').remove();
			// success out for form
			$("#categoriesName").closest('.form-group').addClass('has-success');
		}

		if(price == "") {
			$("#price").after('<p class="text-danger">Price field is required</p>');

			$('#price').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#price").find('.text-danger').remove();
			// success out for form
			$("#price").closest('.form-group').addClass('has-success');
		}

		if(stock == "") {
			$("#stock").after('<p class="text-danger">Stock field is required</p>');

			$('#stock').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#stock").find('.text-danger').remove();
			// success out for form
			$("#stock").closest('.form-group').addClass('has-success');
		}

		if(productStatus == "") {
			$("#productStatus").after('<p class="text-danger">Status field is required</p>');

			$('#productStatus').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#productStatus").find('.text-danger').remove();
			// success out for form
			$("#productStatus").closest('.form-group').addClass('has-success');
		}

		if(productName && brandName && categoriesName && price && stock && productStatus) {
			var form = $(this);
			// button loading
			$("#createProductsBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#createProductsBtn").button('reset');

					if(response.success == true) {
						// reload the manage member table
						manageProductsTables.ajax.reload(null, false);

  	  			// reset the form text
						$("#submitProductsForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');

  	  			$('#add-products-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="fa fa-check fa-fw"></i></strong> '+ response.messages +
          '</div>');

  	  			$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					}  // if
					else {
						manageProductsTables.ajax.reload(null, false);

  	  			// reset the form text
						$("#submitProductsForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-failed');

  	  			$('#add-products-messages').html('<div class="alert alert-danger">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="fa fa-exclamation fa-fw"></i></strong> '+ response.messages +
          '</div>');

  	  			$(".alert-danger").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					}
				} // /success
			}); // /ajax
		} // if

		return false;
	}); // /submit brand form function

});

function editProducts(productsId = null) {
	if(productsId) {
		// remove hidden brand id text
		$('#productsId').remove();

		// remove the error
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-brand-result').addClass('div-hide');
		// modal footer
		$('.editProductsFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedProduct.php',
			type: 'post',
			data: {productsId : productsId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-brand-result').removeClass('div-hide');
				// modal footer
				$('.editProductsFooter').removeClass('div-hide');

				// setting the brand name value
				$('#editProductName').val(response.product_name);
				// setting the brand status value
				$('#editProductsBrandName').val(response.brandID);

				$('#editProductsCategoriesName').val(response.categoriesID);

				$('#editPriceProduct').val(response.price);
				// setting the brand status value
				$('#editStockProduct').val(response.quantity);

				$('#editProductStatus').val(response.status);
				// brand id
				$(".editProductsFooter").after('<input type="hidden" name="productsId" id="productsId" value="'+response.productID+'" />');

				// update brand form
				$('#editProductsForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');

					var editProductName = $("#editProductName").val();
					var editProductsBrandName = $("#editProductsBrandName").val();
					var editProductsCategoriesName = $("#editProductsCategoriesName").val();
					var editPriceProduct = $("#editPriceProduct").val();
					var editStockProduct = $("#editStockProduct").val();
					var editProductStatus = $("#editProductStatus").val();

					if(editProductName == "") {
						$("#editProductName").after('<p class="text-danger">Product Name field is required</p>');
						$('#editProductName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editProductName").find('.text-danger').remove();
						// success out for form
						$("#editProductName").closest('.form-group').addClass('has-success');
					}

					if(editProductsBrandName == "") {
						$("#editProductsBrandName").after('<p class="text-danger">Brand Name field is required</p>');
						$('#editProductsBrandName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editProductsBrandName").find('.text-danger').remove();
						// success out for form
						$("#editProductsBrandName").closest('.form-group').addClass('has-success');
					}

					if(editProductsCategoriesName == "") {
						$("#editProductsCategoriesName").after('<p class="text-danger">Categories Name field is required</p>');

						$('#editProductsCategoriesName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editProductsCategoriesName").find('.text-danger').remove();
						// success out for form
						$("#editProductsCategoriesName").closest('.form-group').addClass('has-success');
					}

					if(editPriceProduct == "") {
						$("#editPriceProduct").after('<p class="text-danger">Price field is required</p>');

						$('#editPriceProduct').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editPriceProduct").find('.text-danger').remove();
						// success out for form
						$("#editPriceProduct").closest('.form-group').addClass('has-success');
					}

					if(editStockProduct == "") {
						$("#editStockProduct").after('<p class="text-danger">Stock field is required</p>');

						$('#editStockProduct').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editStockProduct").find('.text-danger').remove();
						// success out for form
						$("#editStockProduct").closest('.form-group').addClass('has-success');
					}

					if(editProductStatus == "") {
						$("#editProductStatus").after('<p class="text-danger">Status field is required</p>');

						$('#editProductStatus').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editProductStatus").find('.text-danger').remove();
						// success out for form
						$("#editProductStatus").closest('.form-group').addClass('has-success');
					}

					if(editProductName && editProductsBrandName && editProductsCategoriesName && editPriceProduct && editStockProduct && editProductStatus) {
						var form = $(this);

						// submit btn
						$('#editProductsBtn').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {

								if(response.success == true) {
									console.log(response);
									// submit btn
									$('#editProductsBtn').button('reset');

									// reload the manage member table
									manageProductsTables.ajax.reload(null, false);
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');

			  	  			$('#edit-products-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="fa fa-fw fa-check"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								} // /if
								else {
									// reload the manage member table
									manageProductsTables.ajax.reload(null, false);
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-failed');

			  	  			$('#edit-products-messages').html('<div class="alert alert-danger">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="fa fa-exclamation fa-fw"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-danger").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
								}
							}// /success
						});	 // /ajax
					} // /if

					return false;
				}); // /update brand form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit brands function

function removeProducts(productsId = null) {
	if(productsId) {
		$('#removeProductsId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedProduct.php',
			type: 'post',
			data: {productsId : productsId},
			dataType: 'json',
			success:function(response) {
				$('.removeProductsFooter').after('<input type="hidden" name="removeProductsId" id="removeProductsId" value="'+response.productID+'" /> ');

				// click on remove button to remove the brand
				$("#removeProductsBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeProductsBtn").button('loading');

					$.ajax({
						url: 'php_action/removeProduct.php',
						type: 'post',
						data: {productsId : productsId},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeProductsBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal
								$('#removeProductsModal').modal('hide');

								// reload the brand table
								manageProductsTables.ajax.reload(null, false);

								$('.remove-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="glyphicon glyphicon-ok-sign"></i></strong> '+ response.messages +
			          '</div>');

			  	  			$(".alert-success").delay(500).show(10, function() {
										$(this).delay(3000).hide(10, function() {
											$(this).remove();
										});
									}); // /.alert
							} else {

							} // /else
						} // /response messages
					}); // /ajax function to remove the brand

				}); // /click on remove button to remove the brand

			} // /success
		}); // /ajax

		$('.removeBrandFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove brands function
