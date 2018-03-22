var manageUsersTables;

$(document).ready(function() {
	// top bar active
	$('#navUsers').addClass('active');

	// manage Products table
	manageUsersTables = $("#manageUsersTables").DataTable({
		'ajax': 'php_action/fetchUsers.php',
		'order': []
	});

	// submit Products form function
	$("#submitUsersForm").unbind('submit').bind('submit', function() {
		// remove the error text
		$(".text-danger").remove();
		// remove the form error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		var usersName = $("#usersName").val();
		var usersPassword = $("#usersPassword").val();
		var usersConfirmPassword = $("#usersConfirmPassword").val();
		var usersRole = $("#usersRole").val();
		var usersEmail = $("#usersEmail").val();

		if(usersName == "") {
			$("#usersName").after('<p class="text-danger">Username field is required</p>');
			$('#usersName').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#usersName").find('.text-danger').remove();
			// success out for form
			$("#usersName").closest('.form-group').addClass('has-success');
		}

		if(usersPassword == "") {
			$("#usersPassword").after('<p class="text-danger">Password field is required</p>');
			$('#usersPassword').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#usersPassword").find('.text-danger').remove();
			// success out for form
			$("#usersPassword").closest('.form-group').addClass('has-success');
		}

		if(usersConfirmPassword == "") {
			$("#usersConfirmPassword").after('<p class="text-danger">Confirm Password field is required</p>');

			$('#usersConfirmPassword').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#usersConfirmPassword").find('.text-danger').remove();
			// success out for form
			$("#usersConfirmPassword").closest('.form-group').addClass('has-success');
		}

		if(usersRole == "") {
			$("#usersRole").after('<p class="text-danger">Role field is required</p>');

			$('#usersRole').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#usersRole").find('.text-danger').remove();
			// success out for form
			$("#usersRole").closest('.form-group').addClass('has-success');
		}

		if(usersEmail == "") {
			$("#usersEmail").after('<p class="text-danger">Email field is required</p>');

			$('#usersEmail').closest('.form-group').addClass('has-error');
		} else {
			// remov error text field
			$("#usersEmail").find('.text-danger').remove();
			// success out for form
			$("#usersEmail").closest('.form-group').addClass('has-success');
		}

		if(usersName && usersPassword && usersConfirmPassword && usersRole && usersEmail) {
			var form = $(this);
			// button loading
			$("#createUsersBtn").button('loading');

			$.ajax({
				url : form.attr('action'),
				type: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				success:function(response) {
					// button loading
					$("#createUsersBtn").button('reset');

					if(response.success == true) {
						// reload the manage member table
						manageUsersTables.ajax.reload(null, false);

  	  			// reset the form text
						$("#submitUsersForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');

  	  			$('#add-users-messages').html('<div class="alert alert-success">'+
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
            // reload the manage member table
						manageUsersTables.ajax.reload(null, false);

  	  			// reset the form text
						$("#submitUsersForm")[0].reset();
						// remove the error text
						$(".text-danger").remove();
						// remove the form error
						$('.form-group').removeClass('has-error').removeClass('has-success');

  	  			$('#add-users-messages').html('<div class="alert alert-danger">'+
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
function editUsers(usersId = null) {

	if(usersId) {
		// remove hidden brand id text
		$('#usersId').remove();

		// remove the error
		$('.text-danger').remove();
		// remove the form-error
		$('.form-group').removeClass('has-error').removeClass('has-success');

		// modal loading
		$('.modal-loading').removeClass('div-hide');
		// modal result
		$('.edit-users-result').addClass('div-hide');
		// modal footer
		$('.editUsersFooter').addClass('div-hide');

		$.ajax({
			url: 'php_action/fetchSelectedUsers.php',
			type: 'post',
			data: {usersId : usersId},
			dataType: 'json',
			success:function(response) {
				// modal loading
				$('.modal-loading').addClass('div-hide');
				// modal result
				$('.edit-users-result').removeClass('div-hide');
				// modal footer
				$('.editUsersFooter').removeClass('div-hide');

				// setting the brand name value
				$('#editUsersName').val(response.username);
				// setting the brand status value
				$('#editUsersPassword').val(response.password);

				$('#editUsersConfirmPassword').val(response.password);

				$('#editUsersRole').val(response.role);
				// setting the brand status value
				$('#editUsersEmail').val(response.email);

				// brand id
				$(".editUsersFooter").after('<input type="hidden" name="usersId" id="usersId" value="'+response.userID+'" />');

				// update brand form
				$('#editUsersForm').unbind('submit').bind('submit', function() {

					// remove the error text
					$(".text-danger").remove();
					// remove the form error
					$('.form-group').removeClass('has-error').removeClass('has-success');

					var editUsersName = $("#editUsersName").val();
					var editUsersPassword = $("#editUsersPassword").val();
					var editUsersConfirmPassword = $("#editUsersConfirmPassword").val();
					var editUsersRole = $("#editUsersRole").val();
					var editUsersEmail = $("#editUsersEmail").val();

					if(editUsersName == "") {
						$("#editUsersName").after('<p class="text-danger">Username field is required</p>');
						$('#editUsersName').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsersName").find('.text-danger').remove();
						// success out for form
						$("#editUsersName").closest('.form-group').addClass('has-success');
					}

					if(editUsersPassword == "") {
						$("#editUsersPassword").after('<p class="text-danger">Password field is required</p>');
						$('#editUsersPassword').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsersPassword").find('.text-danger').remove();
						// success out for form
						$("#editUsersPassword").closest('.form-group').addClass('has-success');
					}

					if(editUsersConfirmPassword == "") {
						$("#editUsersConfirmPassword").after('<p class="text-danger">Confirm Password field is required</p>');

						$('#editUsersConfirmPassword').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsersConfirmPassword").find('.text-danger').remove();
						// success out for form
						$("#editUsersConfirmPassword").closest('.form-group').addClass('has-success');
					}

					if(editUsersRole == "") {
						$("#editUsersRole").after('<p class="text-danger">Role field is required</p>');

						$('#editUsersRole').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsersRole").find('.text-danger').remove();
						// success out for form
						$("#editUsersRole").closest('.form-group').addClass('has-success');
					}

					if(editUsersEmail == "") {
						$("#editUsersEmail").after('<p class="text-danger">Email field is required</p>');

						$('#editUsersEmail').closest('.form-group').addClass('has-error');
					} else {
						// remov error text field
						$("#editUsersEmail").find('.text-danger').remove();
						// success out for form
						$("#editUsersEmail").closest('.form-group').addClass('has-success');

					}
					if(editUsersName && editUsersPassword && editUsersConfirmPassword && editUsersRole && editUsersEmail) {
						var form = $(this);

						// submit btn
						$('#editUsersBtn').button('loading');

						$.ajax({
							url: form.attr('action'),
							type: form.attr('method'),
							data: form.serialize(),
							dataType: 'json',
							success:function(response) {

								if(response.success == true) {
									console.log(response);
									// submit btn
									$('#editUsersBtn').button('reset');

									// reload the manage member table
									manageUsersTables.ajax.reload(null, false);
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');

			  	  			$('#edit-users-messages').html('<div class="alert alert-success">'+
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
									$('#editUsersBtn').button('reset');

			            // reload the manage member table
									manageUsersTables.ajax.reload(null, false);
			  	  			// reset the form text
									// remove the error text
									$(".text-danger").remove();
									// remove the form error
									$('.form-group').removeClass('has-error').removeClass('has-success');

			  	  			$('#edit-users-messages').html('<div class="alert alert-danger">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="fa fa-exclamation" aria-hidden="true"></i></strong> '+ response.messages +
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

function removeUsers(usersId = null) {
	if(usersId) {
		$('#removeUsersId').remove();
		$.ajax({
			url: 'php_action/fetchSelectedUsers.php',
			type: 'post',
			data: {usersId : usersId},
			dataType: 'json',
			success:function(response) {
				$('.removeUsersFooter').after('<input type="hidden" name="removeUsersId" id="removeUsersId" value="'+response.userID+'" /> ');

				// click on remove button to remove the brand
				$("#removeUsersBtn").unbind('click').bind('click', function() {
					// button loading
					$("#removeUsersBtn").button('loading');

					$.ajax({
						url: 'php_action/removeUsers.php',
						type: 'post',
						data: {usersId : usersId},
						dataType: 'json',
						success:function(response) {
							console.log(response);
							// button loading
							$("#removeUsersBtn").button('reset');
							if(response.success == true) {

								// hide the remove modal
								$('#removeUsers').modal('hide');

								// reload the brand table
								manageUsersTables.ajax.reload(null, false);

								$('.remove-messages').html('<div class="alert alert-success">'+
			            '<button type="button" class="close" data-dismiss="alert">&times;</button>'+
			            '<strong><i class="fa fa-fw fa-check"></i></strong> '+ response.messages +
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

		$('.removeUsersFooter').after();
	} else {
		alert('error!! Refresh the page again');
	}
} // /remove brands function
