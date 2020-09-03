<?php include 'functions/register.php';
if (isset($_GET['success']) && empty ($_GET['success']))
{
	$success[]= 'You have been registered successfully';
	output_success($success);
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/login.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
</head>
<body style="height:100vh">

<section id="id02" style="display:none;">
												<div align="center" class="modal">
													<div class="formcontainer2">
														<form id="form" class="modal-content animate" action="" method="post" enctype="multipart/form-data">
														<div class="closebtncontainter">
														<a class="closebtn"onclick="selectionopen();closebox();"><i class="fas fa-times"></i></a>
														</div>
									
														
																<div align="center" class="list2">
																<ul style="list-style: none;">
																<li class="fileinput">
																<label class="custominput">
																<i class="fas fa-image"></i>
   																<input style="display: none" type="file" name="profile"/>
   														
   																<p class="element-to-paste-filename">
   																</p>
   														
   																</label>
																</li>	
																<li>
																<i class="fas fa-user-circle"></i>
																<input type="text" name="username" value="" placeholder="User name..." required>
																</li>
																<li>
																<i class="fas fa-user"></i>
																<input type="text" name="first_name" placeholder="First Name..." value="">
																</li>
																<li>
																<i class="fas fa-user"></i>
																<input type="text" name="last_name" placeholder="Last Name..." value="">
																</li>
																<li>
																<i class="fas fa-key"></i>
																<input type="password" name="password" placeholder="Password..." value="" required>
																</li>
																<li>
																<i class="fas fa-key"></i>
																<input type="password" name="confirm_password" placeholder="Confirm Password..." value="" required>
																</li>
																<li>
																<i class="fas fa-at"></i>
																<input type="email" name="email" placeholder="Email..." value="" required>
																</li>
																</ul>
																</div>
																<div class="errortext">
																	<?php echo output_reg_errors($reg_errors); ?>
																	<?php echo output_success($success);?>
																</div>
																	<div class="loginbtncontainer">
																	<button class="loginbtn" name="btn2" type="Submit">Submit</button>
																	</div>
														
															
														
														</form>
													</div>
												</div>
</section>
<script>
$('input[type=file]').change(function (e) {
    $(this).parents('.custominput').find('.element-to-paste-filename').text(e.target.files[0].name);
});
</script>
</body>
</html>
