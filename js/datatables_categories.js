var manageCategoriesTable;

$(document).ready(function() {
	// top bar active
	$('#navCategories').addClass('active');

	// manage Categories table
	manageCategoriesTable = $("#manageCategoriesTable").DataTable({
		'ajax': 'php_action/fetchCategories.php',
		'order': []
	});

	// submit Categories form function
	$("#submitCategoriesForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		var CategoriesName = $("#CategoriesName").val();
		var CategoriesStatus = $("#CategoriesStatus").val();

		if(CategoriesName == "") {
			$("#CategoriesName").after('<p class="text-danger">Categories Name field is required</p>');
			$('#CategoriesName').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#CategoriesName").find('.text-danger').remove();
			// success out for form
			$("#CategoriesName").closest('.form-group').addClass('has-success');
		}

		if(CategoriesStatus == "") {
			$("#CategoriesStatus").after('<p class="text-danger">Status field is required</p>');

			$('#CategoriesStatus').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#CategoriesStatus").find('.text-danger').remove();
			// success out for form
			$("#CategoriesStatus").closest('.form-group').addClass('has-success');
		}

		if(CategoriesName && CategoriesStatus) {
			var form = $(this);
			// button loading
			$("#createCategoriesBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#createCategoriesBtn").button('reset');

					if(response.success == true) {
						// reload the manage member table
						manageCategoriesTable.ajax.reload(null, false);

  	  			// reset the form text
						$("#submitCategoriesForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');

  	  			$('#add-Categories-messages').html('<div class="alert alert-success">'+
            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
            '<strong><i class="fa fa-fw fa-check"></i></strong> '+ response.messages +
          '</div>');

  	  			$(".alert-success").delay(500).show(10, function() {
							$(this).delay(3000).hide(10, function() {
								$(this).remove();
							});
						}); // /.alert
					}  // if
					else {
						manageCategoriesTable.ajax.reload(null, false);

  	  			// reset the form text
						$("#submitCategoriesForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-failed');

  	  			$('#add-Categories-messages').html('<div class="alert alert-danger">'+
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
	}); // /submit Categories form function

});

function editCategories(CategoriesId = null) {
	if(CategoriesId) {
		// remove hidden Categories id text
		$('#CategoriesId').remove();

		// remove the error
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-Categories-result').addClass('div-hide');
		// modal footer
		$('.editCategoriesFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedCategories.php',
			type: 'post',
			data: {CategoriesId : CategoriesId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-Categories-result').removeClass('div-hide');
				// modal footer
				$('.editCategoriesFooter').removeClass('div-hide');

				// setting the Categories name value
				$('#editCategoriesName').val(response.categories_name);
				// setting the Categories status value
				$('#editCategoriesStatus').val(response.status);

				// Categories id
				$(".editCategoriesFooter").after('<input type="hidden" name="CategoriesId" id="CategoriesId" value="'+response.categoriesID+'" />');

				// update Categories form
				$('#editCategoriesForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');

					var CategoriesName = $('#editCategoriesName').val();
					var CategoriesStatus = $('#editCategoriesStatus').val();

					if(CategoriesName == "") {
						$("#editCategoriesName").after('<p class="text-danger">Categories Name field is required</p>');
						$('#editCategoriesName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editCategoriesName").find('.text-danger').remove();
						// success out for form
						$("#editCategoriesName").closest('.form-group').addClass('has-success');
					}

					if(CategoriesStatus == "") {
						$("#editCategoriesStatus").after('<p class="text-danger">Categories Name field is required</p>');

						$('#editCategoriesStatus').closest('.form-group').addClass('has-error');
					} else {
						// remove error text field
						$("#editCategoriesStatus").find('.text-danger').remove();
						// success out for form
						$("#editCategoriesStatus").closest('.form-group').addClass('has-success');
					}

					if(CategoriesName && CategoriesStatus) {
						var form = $(this);

						// submit btn
						$('#editCategoriesBtn').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {

								if(response.success == true) {
									console.log(response);
									// submit btn
									$('#editCategoriesBtn').button('reset');

									// reload the manage member table
									manageCategoriesTable.ajax.reload(null, false);
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');

			  	  			$('#edit-Categories-messages').html('<div class="alert alert-success">'+
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
									console.log(response);
									// submit btn
									$('#editCategoriesBtn').button('reset');

									// reload the manage member table
									manageCategoriesTable.ajax.reload(null, false);
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-failed');

			  	  			$('#edit-Categories-messages').html('<div class="alert alert-danger">'+
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
				}); // /update Categories form

			} // /success
		}); // ajax function

	} else {
		alert('error!! Refresh the page again');
	}
} // /edit Categoriess function

function removeCategories(CategoriesId = null) {
	if(CategoriesId) {
		$('#removeCategoriesId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedCategories.php',
			type: 'post',
			data: {CategoriesId : CategoriesId},
			dataType: 'json',
			success:function(response) {
				$('.removeCategoriesFooter').after('<input type="hidden" name="removeCategoriesId" id="removeCategoriesId" value="'+response.categoriesID+'" /> ');

				// click on remove button to remove the Categories
				$("#removeCategoriesBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeCategoriesBtn").button('loading');

					$.ajax({
						url: 'php_action/removeCategories.php',
						type: 'post',
						data: {CategoriesId : CategoriesId},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeCategoriesBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal
								$('#removeMemberModal').modal('hide');

								// reload the Categories table
								manageCategoriesTable.ajax.reload(null, false);

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
					}); // /ajax function to remove the Categories

				}); // /click on remove button to remove the Categories

			} // /success
		}); // /ajax

		$('.removeCategoriesFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove Categoriess function
