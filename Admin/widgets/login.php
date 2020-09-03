<?php include 'functions/login.php'; ?>
<html>
<head>
<style>
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
html,body{padding:0;margin:0;font-family: "Calibri";background:black}
/* Set a style for all buttons */
.loginbtn {
  background-color:red;
  box-shadow:0px 0px 7px black;
  border-radius:10px 10px 10px 10px;
  color: white;
  padding: 14px 20px;
  border: none;
  cursor: pointer;
  width: 50%;
  font-family:"Calibri";
  transition:0.2s;
  
}
.loginbtncontainer{position:absolute;background-color:transparent;width:100%;height:auto;bottom:10%;}

.loginbtn:hover {
	box-shadow:0px 0px 0px black;
	transition:0.5s ease;
	
}
.closebtncontainter
{
	position:relative;
	width:100%;
	height:10%;
	text-align:right;
	background-color:transparent;
}
.closebtn
{
	position:relative;
	color:#303030;
	top:50%;
	font-size:20px;
	right:5%;
	cursor:pointer;
	transition:0.2s;
}
.closebtn:hover
{
	color:red;
}
.imgcontainer 
{
position:relative;
 width:100%;
 height:50%;
 display:flex;
 justify-content:center;
 top:0%;
 background-color:transparent;
}
.imgcontainer img
{
	top:0%;
	max-width:40%;
	max-height:60%;
	border-radius:100%;
}
/* The Modal (background) */
.modal {
  align-items:center;
  justify-content:center;
  display: flex; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 2; /* Sit on top */
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: hidden; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content/Box */
.modal-content {	

	position:absolute;
  background-color:transparent;
  color:#d4d3db;
  min-width:100%;
  height:100%;
  /* Could be more or less, depending on screen size */
}
.modal-content input
{
	width: 80%;
	border-radius: 10px;
	outline: none;
		color: grey;
	background: transparent;
	box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
}
.formcontainer
{
	position:absolute;
	 color:black !important;
	height:350px;
	width: 300px;
	max-height:450px;
	max-width: 400px;
	background-color:white;
	align-items:center;
    justify-content:center;
	display:flex;
	border-radius:10px;
	box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
}



/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}
.animate1 {
  -webkit-animation: animatezoomout 0.6s;
  animation: animatezoomout 0.6s
}

@-webkit-keyframes animatezoomout {
  from {-webkit-transform: scale(1)} 
  to {-webkit-transform: scale(0)}
  from {opacity: 1}
  to {opacity: 0}
}
  
@keyframes animatezoomout {
  from {transform: scale(1)} 
  to {transform: scale(0)}
  from {opacity: 1}
  to {opacity: 0}
}
.error
{
	width: 100%;
}
.error ul
{
	padding: 0;
	margin: 0;
}

</style>
</head>
<body>
<section id="id01" style="display:block;">
												<div align="center" class="modal">
													<form class="formcontainer animate" action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">
														<div class="modal-content ">
														<label for="username"><b>Username</b></label>
														<input type="text" placeholder="Enter Username" name="username" required>

														<label for="password"><b>Password</b></label>
														<input type="password" placeholder="Enter Password" name="password" required>																			
														<div class="error" style=""><?php echo output_errors($errors)?></div>
														<div class="loginbtncontainer">
														<button type="submit" class="loginbtn" >Login</button>
														<!-- <a href="widgets/register.php">Register</a> -->
														</div>
														</div>
														
															
														
													</form>
												</div>
												</div>
								</section>
								</body>
</html>
