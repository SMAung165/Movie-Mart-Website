<?php include'functions/login.php';?>
<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="css/login.css">
<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
</head>
<body style="height:100vh">
<div class="fallback">
<section id="id01" style="display:block;">
												<div align="center" class="modal">
													<!-- <div style="position:absolute;top:15%;box-shadow:0px 0px 16px rgba(255,0,0,1);border-radius:100%;padding:15px;display:flex;align-items:center;justify-content:center;width:5%;background-color:transparent;">
														<img style="width:100%;"src="icons/Logo player.png">
													</div> -->
													<div class="formcontainer">
														<form class="modal-content animate" action="" method="post">
														<div class="closebtncontainter">
														<a class="closebtn"onclick="selectionopen();closebox()"><i class="fas fa-times"></i></a>
														</div>
									
														
																<div align="center" class="list">
																<ul style="list-style: none;">
																<li>
																<i class="fas fa-user-circle"></i>
																<input type="text" name="username" value="" placeholder="User name..." required>
																</li>
																<li>
																<i class="fas fa-key"></i>
																<input type="password" name="password" value="" placeholder="Password..." required>
																</li>
																</ul>
																</div>
																<div class="errortext">
																	<?php echo output_errors($errors); ?>
																</div>
																	<div class="loginbtncontainer">
																	<input class="loginbtn" name="btn1" type="submit" value="Submit"></input>
																	</div>
														
															
														
														</form>
													</div>
												</div>
</section>
</div>
</body>
</html>
