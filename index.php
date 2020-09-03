<!DOCTYPE html>
<?php
include 'init.php';
include ('widgets/register.php');
include ('widgets/login.php');
?>
<html lang="en">


	<title>Movie Mart</title>
	<style>
.cover
{
	height: 100vh;
	width: 100vw;
	display: flex;
	justify-content: center;
	position: absolute;
	top:0%;
	background-color: rgba(0,0,0,0.0);
	backdrop-filter:blur(8px) saturate(150%);
	align-items: center;
}
.btn
{
	width:18vh;
	height: 5vh;
	border-radius:40px;
	text-align: center;
	margin:10px;
	cursor: pointer;
	font-size: 2.2vh;
	font-family: 'Calibri';
	font-weight: lighter;
	color:white;
	box-shadow: 0px 8px 16px rgba(0,0,0,0.4);
	transition: 0.5s ease;
	background-color: rgba(0,0,0,0.4);
}
.btn:hover
{
	box-shadow: 0px 8px 16px rgba(255,0,0,0.7);
	background-color: rgba(255,0,0,0.9);
}
.btn:active
{
	box-shadow: 0px 0px 0px rgba(255,0,0,0);
	background-color: rgba(255,0,0,0.0);
	transition: 0s;
}

.active
{
	background-color: rgba(255,0,0,0.9) ;
	box-shadow: 0px 8px 16px rgba(255,0,0,0.7) ;
}
.close
{
	position: absolute;
	top:10%;
	background-color:rgba(0,0,0,0.4);
	box-shadow: 0px 8px 16px rgba(0,0,0,0.5);
	display:flex;
	justify-content: center;
	align-items: center;
	width:6vh;
	height:6vh;
	font-family: calibri;
	cursor:pointer;
	border-radius:100%;
	color:white;
	transition: 0.5s ease;
}
.close:hover
{
	box-shadow: 0px 8px 16px rgba(255,0,0,0.7);
	background-color: rgba(255,0,0,0.9);
}
.close:active
{
	box-shadow: 0px 0px 0px rgba(255,0,0,0);
	background-color: rgba(255,0,0,0.0);
	transition: 0s;
}
</style>


<body>
<section id="selection">
<div class="cover">
	
	<div class="close animate" onclick="selectionclose()">
		<a>
		<i class="fas fa-times"></i>
		</a>
	</div>
	<div align="center" class="animate">
	<span id="btns">
		<button class="btn active" onclick="login()">
			Login
		</button>
		<button class="btn " onclick="register()">
			Register
		</button>
	</span>
	<div class="errortext">
	<?php echo output_reg_errors($reg_errors); ?>
	<?php echo output_success($success);?>
	<?php echo output_errors($errors); ?>
	</div>
</div>
</div>
</section>

<script>
	function closebox()
	{
			var a=document.getElementById('selection');
			var b=document.getElementById('id01');
			var c=document.getElementById('id02');
			var d=document.getElementsByClassName('btn');
		if (((b.style.display=='block')=== true) || ((c.style.display=='block')===true))
		{
				
			b.style.display='none';
			c.style.display='none';
				if (((b.style.display=='none')=== true) && ((c.style.display=='none')===true))
				{
					
						d[0].classList.remove("active");
						d[1].classList.remove("active");
					
				}
		}
		
	}
		

	function login()
	{
		document.getElementById('id01').style.display="block";
		document.getElementById('id02').style.display="none";
	}
		function register()
	{
		document.getElementById('id01').style.display="none";
		document.getElementById('id02').style.display="block";
	}

	function selectionclose()
	{
		var a=document.getElementById('selection');
		var b=document.getElementById('id01');
		var c=document.getElementById('id02');
		var d=document.getElementsByClassName('btn');
		var current = document.getElementsByClassName("active");
		if (((b.style.display=='none')=== true) && ((c.style.display=='none')===true))
		{
			a.style.display="none";
			b.style.display="block";
		}
		else
		{
			a.style.display="none";
		}
	}
	function selectionopen()
	{
		var a=document.getElementById('selection');
		a.style.display="block";

	}

var a =document.getElementsByClassName("btn");
  a[0].addEventListener("click", function()
  {
  	a[0].classList.remove("active");
  	a[0].className += " active";
  	a[1].classList.remove("active");
  });
  a[1].addEventListener("click", function()
  {
  	a[1].classList.remove("active");
  	a[1].className += " active";
  	a[0].classList.remove("active");
  });
</script>
</body>
</html>