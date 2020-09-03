<!DOCTYPE html>
<?php include'changepassword.php'?>
<?php
if(isset($_FILES['profile'])=== true)
{
	if(empty($_FILES['profile']['name'])=== true)
	{
		echo 'Please choose a file!';
	}
	else
	{
		$allowed =array('jpg','jpeg','gif','png');
		
		$file_name=$_FILES['profile']['name'];
		$file_extn= explode('.',$file_name);
		$file_extension=strtolower(end($file_extn));
		$file_temp=$_FILES['profile']['tmp_name'];
		if(in_array($file_extension,$allowed)===true)
		{
			
			upload_profile_image($session_user_id, $file_temp,$file_extension);
			header('Location: '.$_SERVER['PHP_SELF']); 
		}
		else
		{
			echo 'Only these file types are allowed: ';
			echo implode( ', ', $allowed);
		}
	}
}	
?>
<?php 
if(empty($user_data['bookmark_movie_id'])===true)
	{
		$divide_bookmark=null;
		$how_many_bookmark=null;
	}
	else
	{   
		// print_r(array($user_data['bookmark_movie_id']));
		$divide_bookmark=explode(',',$user_data['bookmark_movie_id']);
		$how_many_bookmark=count($divide_bookmark);
		// echo implode(",",$divide_bookmark);
	}
$query=mysqli_query($link,"SELECT * FROM `movies`");
$row =mysqli_num_rows($query);
?>


<?php 
if (isset($_POST['remove_bookmark_btn'])) 
	{
		$getvalue2=($_POST['bookmark_movie_id']);
			if(empty($getvalue2) === false)
			{
						echo $search_array=array_search($getvalue2,$divide_bookmark)."<br>";
						unset($divide_bookmark[(int)$search_array]);
						echo"<br>";
						$bookmark_list=implode($divide_bookmark,",");
				        mysqli_query($link,"UPDATE `users` SET `bookmark_movie_id`='$bookmark_list' WHERE `user_id`=$session_user_id");
				        header("Location:".$_SERVER['PHP_SELF']);
				        exit();
			}	

	}

?>
<html>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
				<meta name="HandheldFriendly" content="true">

<head>
<title>Movie Mart</title>
			<link rel="icon" href="../icons/Logo player.png">

<link rel="stylesheet" type="text/css" href="../css/nightmodeswitch.css">
<link rel="stylesheet" type="text/css" href="../css/Style0.css">
<link rel="stylesheet" type="text/css" href="../css/Style1.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="../Scripts/jquery-ui.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>



<style>
html,body{
margin:0;
padding:0;
overflow-x:hidden;
}
.active 
{
  background-color: rgba(255,0,0,0.9);
  box-shadow: 0px 8px 16px rgba(255,0,0,0.7) !important;
  color:white;

}
	.nav {
	height:100%;
	width:210px;
	max-width: 210px;
	position:fixed;
	z-index:1;
	top:0;
	left:0;
	padding-top:60px;
	transition:0.5s ease;
	box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
}
.nav div 
{
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
}
.nav div div
{

	font-family: calibri;
	font-weight: lighter;
	position: relative;
	width: 100%;
	height: 100%
	border-radius: 6px;
	display: flex;
	justify-content: center;
	align-items: center;
	

}
.nav div div div span
{
	float:left;
	position: relative;
	padding: 6%;
}
.nav div div .btn
{
	width: 100%;
	display:flex;
	border-radius: 10px;
	margin:5%;
	cursor: pointer;
	justify-content:left;
	box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
	position: relative;
}
.btn:hover
{
	box-shadow: 0px 8px 16px rgba(255,0,0,0.7);
	color:white !important;
	background-color: rgba(255,0,0,0.9);
}
.btn:active
{
	box-shadow: 0px 0px 0px rgba(255,0,0,0)!important;
	background-color: rgba(255,0,0,0.0);
	transition: 0s;
}
@media only screen and (min-width:320px) and (max-width:719px)
{
	.nav
	{
		width: 210px;
		max-width: 210px;
		display: none;
	} 
	.fakebody
	{
		width: 100%;
		margin:0px;
	}
}
@media only screen and (min-width:720px) and (max-width:1080px)
{
	.nav
	{
		width: 210px;
		max-width: 210px; 
	} 
	.fakebody
	{
		margin-left: 210px;
	}
	.topiccontainer
	{
		margin-left:210px;
		height:auto;
	}
}
@media only screen and (min-width:1081px)
{
	.fakebody
	{
		margin-left:210px;
	}
	.topiccontainer
	{
		margin-left:210px;
		height:auto;
	}
}
.fakebody
{
	position:relative;
	display:flex;
	z-index: 0;
	height: 100%;
	align-items: center;
	justify-content: center;
}
.imagecontainer
{
	display: flex;
	justify-content: center;
	align-items: center;
	height: 20%;
	border-radius: 10px;
	background-color: transparent;
	padding-top: -10px;
}
.crop
{
margin: -80px auto 0;
padding: 4px;
overflow: hidden;
display: flex;
justify-content: center;
align-items: center;
max-width: 130px;
width:130px;
box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);
max-height: 130px;
height: 130px;
border-radius: 100%;
animation:flow 10s linear infinite;
background: linear-gradient(45deg, #fb0094,#0000ff,#00ff00,#ffff00,#ff0000,#ff0000,#ffff00,#00ff00,#0000ff,#fb0094);
background-size:400%;
}
@keyframes flow
{
    0%
   {
     background-position:0 50%;
   }
   50%
   {
     background-position:100% 50%;
   }
   100%
   {
     background-position:0 50%;
   }
   
}
.crop img 
{
	
	border-radius: 100%;
	width: 100%;
	height:100%;
	background-size: cover;
	background-repeat: no-repeat;
	display: block;
}
.profilecard
{
	background-color:transparent;
	width: 300px;
	max-width: 300px;
	height: 250px;
	max-height: 250px;
	border-radius:10px;
	box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
}
.responsivecontainer
{

	height: 100%;
	width: 100%;
	background-color: transparent;
	display: flex;
	justify-content: center;
	align-items: center;
}
.containerfooter
{
	width: 100%;
	position: relative;
	top:0%;
	background-color: transparent;
	text-align: center;
	height: auto;
}
.username
{
	font-weight: bold;
}
.first-last_name
{
	font-weight: lighter;
}
.status
{
 background-color: #5efc03;
 width: 15px;
 height: 15px;
 max-width: 15px;
 border-radius: 100%;
 max-height: 15px;
 box-shadow: 0px 8px 16px rgba(94, 252, 3,0.5);
}
.statuscontainer
{
	text-align: center;
	display: inline-block;
	position: relative;
	background-color: transparent;
}
.statuscontainer td p
{
	text-shadow: 0px 8px 16px rgba(0,0,0,0.5);
}
.mobilecontent-container
{
 width: 100%;
 position: absolute;
 display: flex;
 z-index:0;
 height:300px;
 background-color: transparent;
 justify-content: center;
 align-items: center;	
}
.mobilenav-overlay {
  font-family: calibri;
  width: 200px;
  height:150px;
  position: relative;
  display: none;
  align-items: center;
  padding: 15px;
  justify-content: center;
  background-color:transparent;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  border-radius: 10px;
  overflow-y: hidden;
  transition: 0.5s ease-in-out;
}

.mobilenav-overlay-content {
  position: relative;
  width: 180px;
  height:120px;
  text-align: center;
  display: flex;
  align-items: center;
  flex-wrap: wrap;
  justify-content: center;
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
.mobilecontent
{
	width:180px;
	height: auto;
	max-width: 180px;
	padding: 12px;
	box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
	cursor: pointer;
	border-radius: 10px;
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
#maincontent
{
	padding-top: 0;
}

</style>
</head>
<section title="movbilenav">
<div class="mobilecontent-container">
<div id="mobilenav" class="mobilenav-overlay animate">
  <div class="mobilenav-overlay-content">
   	<div class="mobilecontent btn active"><i class="fas fa-user-circle"></i> Profile</div>
    <div class="mobilecontent btn"><i class="fas fa-user-circle"></i> Bookmarks</div>
  </div>
</div>
</div>
</section>
<div draggable="true" style="position:absolute;width:100%;z-index:2">
			<div id="draggable" class="animate"style="" class="ui-widget-content">
			<div id="search-box">
			<div class="search-text">
		<input align="center" onkeyup="search();" id="search-txt" type="text" placeholder="Enter text here">
			</div>
			<div style="z-index:1;">
			<a id="s-btn"style="">
			<i class="fas fa-search"></i>
			</a>
			</div>
			</div>
			</div>
			</div>		
	<section id="id01" style="display:none;">

												<div align="center" class="modal">
													<div class="formcontainer">
														<div class="modal-content animate">
														<div class="closebtncontainter">
														<a class="closebtn"onclick="document.getElementById('id01').style.display='none'"><i class="fas fa-times"></i></a>
														</div>
									
														
											<div align="center" class="imgcontainer">
												<?php if(empty($user_data['profile'])=== false)
												{
												echo "<img src='".$user_data['profile']."'".">";
												}?>
											</div>
																	<div class="username">
																		<p class="profilebtn" onclick='window.location.href="../functions/aside.php"'>
																		<?php echo $user_data["username"]; ?>
																		</p>
																	</div>
																	<div class="loginbtncontainer">
																	<button class="loginbtn"  onclick="window.location.href='../functions/logout.php'" >Logout</button>
																
																	</div>
														
															
														
														</div>
													</div>
												</div>
								</section>

<body style="height:100vh;" id="night">

							<section id="1">
								<header>
									<div align="center" class="nav">
									
										<div>
											<div>
														<div class="btn active">
														<span><i class="fas fa-user-circle"></i></span>
														<span>Profile</span>
														</div>
												</div>
													
												<div>
													<div  class="btn">
														<span><i class="fas fa-user-circle"></i></span>
														<span>Bookmarks</span>
														</div>
												</div>
												<div>
													<div  class="btn">
														<span><i class="fas fa-user-circle"></i></span>
														<span>Comments</span>
													</div>
												</div>
											</div>
										</div>
											
										</header>
							</section>
															<div style="" class="topiccontainer">
															<table border="0" id="mytopicContainer" style="border:0px;padding:0px;margin:0px;width:100%;">
															<tr>
														<td style="background-color:transparent;width:20%;">
														<p style="text-align:left;"class="topic" onclick="window.location.href='aside.php'">My Profile</p>
															</td>
															<td  style="background-color: transparent;width:70%;text-align: center;">
															<span class="mobilenavbars" style="display:none;font-size:20px;cursor:pointer" onclick="open_mobilenav()"><i class="fas fa-bars"></i></span>
															</td>

															<td style="background-color: transparent;width:1%;padding-right:20px;text-align: center;">
																<p onclick="showsbox()" class="topic"><i class="fas fa-search"></i></p>	
															</td>

															<td style="width:1%;text-align: center;">
															<p class="topic" href="#" onclick="document.getElementById('id01').style.display='block'">
																	<i class="fas fa-user"></i>
																</i>
															</p>
															</td>
															<td  style="background-color:transparent;width:10%">
											<p style="text-align:center;"onclick="window.location.href='../Main Pages/Microanime.php'" class="topic">Home</p>
															</td>
															<td style="width: 10%;">
															<div class="theme-switch-wrapper" align="center" style="position:relative;width:100%;">										
																											
													
													<label class="switch">
													<input  id="switch" type="checkbox">
														<span class="slider round"></span>
													</label>
												</div>

															</td>
															</tr>
															</table>
															</div>
							<div class="fakebody">


																													
										<div class="profilecard">
											<div class="imagecontainer">
												<div class="crop">
													<?php if(empty($user_data['profile'])=== false)
													{
													echo "<img src='".$user_data['profile']."'".">";
													}?>
												</div>
											</div>
															<div class="containerfooter">
																	<div class="">
																		<p class="username" onclick='window.location.href="../functions/aside.php"'>
																		<?php echo $user_data["username"]; ?>
																		</p>
																	</div>
																	<div class="first-last_name">
																		<p class="" onclick='window.location.href="../functions/aside.php"'>
																		<?php echo $user_data["first_name"].' '.$user_data['last_name'] ?>
																		</p>
																	</div>
																	<div class="first-last_name">
																		<p class="" onclick='window.location.href="../functions/aside.php"'>
																		<?php echo $user_data["email"] ?>
																		</p>
																	</div>
															</div>
															<div align="center">
															<table align="center" class="statuscontainer">
																<tr>
																	<td>
																		<div class="status">
																		</div>
																	</td>
																	<td>
																		<p>
																			Online
																		</p>
																	</td>
																</tr>
															</table>
														</div>

														</div>




	<div align="center" id="maincontent" class="bookmarks Flexbox1" style="display: none;">
	<?php
	for($i=0;$i<($how_many_bookmark);$i++)
	{$row_query1=mysqli_fetch_assoc(mysqli_query($link,"SELECT * FROM `movies` WHERE `movie_id`=$divide_bookmark[$i]")); ?>		
			
	
							
									
										<div class="li animate <?php echo $row_query1['class']?>">
											<div class="card " onclick="">
												<form action="../Sub Pages/createpage.php" method="get">
													<input type="hidden"  name='movie_id' value="<?php echo $movieid=$row_query1['movie_id']?>">
														<button class="moviebtn" name="movie_btn" style="border: none;background-color: transparent;">
															<div class="crop1"><?php echo '<img class="image" src='.$row_query1['image'].'>'; ?></div>
														</button>
												</form>
												<div class="container">
				<p style="color:#FFB738;">IMDB <text style="color:grey;"><?php echo $row_query1['rating'] ?></text></p>
													<h4>
														<p><?php echo $row_query1['movie_name'] ?></p>	</h4>
						<p style="overflow:auto;max-height:20px;max-width: 140px;">
						<?php

						if(empty($row_query1['sub_title'])===true)
						{
							echo "----";
						}
						else
						{
							echo $row_query1['sub_title'];
						}
						?>
				
						</p>	

						<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

						<input name="bookmark_movie_id" value="<?php echo $row_query1['movie_id']?>" type="hidden">

						<button type="submit"style="display: flex;justify-content: center;align-items: center;" name="remove_bookmark_btn" class="btnstyle">

						<i class="fas fa-trash"></i>
						</button>

						</form>											
													
												</div>
									
											</div>
										</div>
									
								
									
									
									
									<?php }?>
								</div>
								


													
							</div>


																	
<script>
var toggle_mobile_nav = document.getElementById("mobilenav");
var navbars=document.getElementsByClassName("mobilenavbars")[0];
var viewport = window.matchMedia("(max-width: 720px)");
var body=document.getElementsByClassName("fakebody")[0];
show_nav(viewport);
viewport.addListener(show_nav)
function show_nav()
	{
		if (viewport.matches) 
		{
				navbars.style.display='block';
				toggle_mobile_nav.style.backgroundColor='white';
		}
		else
		{
			navbars.style.display='none';
			toggle_mobile_nav.style.backgroundColor='transparent';
			toggle_mobile_nav.style.display='none';
		}	
	}



function open_mobilenav() {
	
  if((toggle_mobile_nav.style.display == "flex")=== true)
  {
  	toggle_mobile_nav.classList.remove("animate");
  	toggle_mobile_nav.className += " animate1";
  	toggle_mobile_nav.style.display = "none";
  	body.style.zIndex="0";
  }
  else
  {	
  	toggle_mobile_nav.style.display = "flex";
  	toggle_mobile_nav.classList.remove("animate1");
  	toggle_mobile_nav.className += " animate";
  	body.style.zIndex="-1";
  	
  }
 
}

$('input[type=file]').change(function (e) {
    $(this).parents('.custominput').find('.element-to-paste-filename').text(e.target.files[0].name);
});

const toggleSwitch = document.querySelector('.switch input[type="checkbox"]');

function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
    }
    else {
        document.documentElement.setAttribute('data-theme', 'light');
    }    
}

toggleSwitch.addEventListener('change', switchTheme, false);

function switchTheme(e) {
    if (e.target.checked) {
        document.documentElement.setAttribute('data-theme', 'dark');
        localStorage.setItem('theme', 'dark'); //add this
    }
    else {
        document.documentElement.setAttribute('data-theme', 'light');
        localStorage.setItem('theme', 'light'); //add this
    }    
}
const currentTheme = localStorage.getItem('theme') ? localStorage.getItem('theme') : null;

if (currentTheme) {
    document.documentElement.setAttribute('data-theme', currentTheme);

    if (currentTheme === 'dark') {
        toggleSwitch.checked = true;
    }
}
var profile=document.getElementsByClassName("profilecard")[0];
var bookmarks=document.getElementsByClassName("bookmarks")[0];
var a =document.getElementsByClassName("btn");
  a[0].addEventListener("click", function()
  {
  	a[0].classList.remove("active");
  	a[0].className += " active";
  	a[1].classList.remove("active");
  	a[2].classList.remove("active");
  	profile.style.display="block";
  	bookmarks.style.display="none";
  });
  a[1].addEventListener("click", function()
  {
  	a[1].classList.remove("active");
  	a[1].className += " active";
  	a[0].classList.remove("active");
  	a[2].classList.remove("active");
  	profile.style.display="none";
  	bookmarks.style.display="flex";
  });
  a[2].addEventListener("click", function()
  {
  	a[2].classList.remove("active");
  	a[2].className += " active";
  	a[0].classList.remove("active");
  	a[1].classList.remove("active");
  	a[3].classList.remove("active");
  	a[4].classList.remove("active");
  	profile.style.display="block";
  	bookmarks.style.display="none";

  });
   a[3].addEventListener("click", function()
  {
  	a[3].classList.remove("active");
  	a[3].className += " active";
  	a[0].classList.remove("active");
  	a[2].classList.remove("active");
  	a[4].classList.remove("active");
  	profile.style.display="none";
  	bookmarks.style.display="flex";
  });

function showsbox()
{
	var x=document.getElementById("draggable")
	var xy=document.getElementById("night")
	if (x.style.display=="block")
	{
	x.style.display="none"
	x.style.top="-60%"
	x.style.left="0%"
	}
	else
	{
	x.style.display="block"
	}
}

$( function() {
$( "#draggable" ).draggable();
} );


var sbtn =document.getElementById("s-btn");
var sbox=document.getElementById("search-box");
var stext=document.getElementsByClassName('search-text');
var stextcontainer=document.getElementById("search-txt");
sbtn.addEventListener("click", function()
  {
  
  	if(sbox.style.width==='310px')
  	{
  		sbox.style.width='40px';
  		stextcontainer.style.width='0px';
  		stextcontainer.style.display='none';
  		stext[0].style.width='0';		
  	}
  	else
  	{
  		sbox.style.width='310px';
  		stext[0].style.width='90%';
  		stextcontainer.style.width='90%';
  		stextcontainer.style.display='block';

  	}
  });


function my_trim_fun(trim_obj)
{
	return trim_obj.replace(/^\s+|\s+$/gm,'');
}


function search() {
    var input, filter, txt1,txt2, i,cardli, content;
    var txtValue1;
    var txtValue2;
    input = document.getElementById("search-txt");
   	content= document.getElementById("maincontent");
   	cardli =content.getElementsByClassName('li');
    filter = my_trim_fun(input.value.toUpperCase());
 	
    for (i = 0; i < cardli.length; i++) {

        txt1 = cardli[i].getElementsByClassName("card")[0].getElementsByTagName('h4')[0];
        txt2 = cardli[i].getElementsByClassName("card")[0].getElementsByClassName('container')[0].getElementsByTagName('p')[2];
        txtValue1 = (txt1.textContent) || (txt1.innerText);
        txtValue2 = (txt2.textContent) || (txt2.innerText);
        // if ((txtValue1.toUpperCase().indexOf(filter) > -1)(txtValue1.toUpperCase().indexOf(filter) > -1))
        if(((txtValue1.toUpperCase().indexOf(filter) >-1 ) || (txtValue2.toUpperCase().indexOf(filter) >-1 )) )
        {
            cardli[i].style.display = "block";
        } 
        else 
        {
            cardli[i].style.display = "none";
        }
    }
}

																	</script>
																<!-- 		<footer id="footer" style="position:absolute;bottom:0%;">
																		<div style="float:left;position:absolute;top:10px;left:10px;font-family:'Good Times';color:grey;">Movie 
																			<text class="changecolor">Mart</text>
																		</div>
																		<div>
																			<a class="footer-text" href="#">
																				<div class="footer" align="center">This Page(HTML) was designed by S.M.A</div>
																			</a>
																		</div>
																	</footer> -->
</body>
</html>