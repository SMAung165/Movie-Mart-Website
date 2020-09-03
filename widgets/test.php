while ($row =mysqli_fetch_assoc($query))
	<?php if($i>=5)
	{ 
		echo "<div style='display:none' class='li ".$column['class']."'".">";
	}
	else
	{
		echo "<div style='display:none' class='li ".$column['class']."'".">";
	}
	?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: 'Lato', sans-serif;
}

.mobilenav-overlay {
  height: 0%;
  width: 100%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-y: hidden;
  transition: 0.5s;
}

.mobilenav-overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
}

.mobilenav-overlay a {
  padding: 8px;
  text-decoration: none;
  font-size: 36px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.mobilenav-overlay a:hover, .mobilenav-overlay a:focus {
  color: #f1f1f1;
}

.mobilenav-overlay .closebtn {
  position: absolute;
  top: 20px;
  right: 45px;
  font-size: 60px;
}

@media screen and (max-height: 450px) {
  .mobilenav-overlay {overflow-y: auto;}
  .mobilenav-overlay a {font-size: 20px}
  .mobilenav-overlay .closebtn {
  font-size: 40px;
  top: 15px;
  right: 35px;
  }
}
</style>
</head>
<body>

<div id="mobilenav" class="mobilenav-overlay">
  <a href="javascript:void(0)" class="closebtn" onclick="close_mobilenav()">&times;</a>
  <div class="mobilenav-overlay-content">
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
  </div>
</div>
<span style="font-size:30px;cursor:pointer" onclick="open_mobilenav()">&#9776; open</span>

<script>
function open_mobilenav() {
  document.getElementById("mobilenav").style.height = "100%";
}

function close_mobilenav() {
  document.getElementById("mobilenav").style.height = "0%";
}
</script>
     
</body>
</html>

	