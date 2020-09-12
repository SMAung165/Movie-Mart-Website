<?php require_once '../init.php';
if(logged_in()===false)
{
    header("location:../index.php");
    exit;
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
	}

$query=mysqli_query($link,"SELECT * FROM `movies`");
$row =mysqli_num_rows($query);

for($i=0;$i<($how_many_bookmark);$i++)
{
	$row_query1=mysqli_fetch_assoc(mysqli_query($link,"SELECT * FROM `movies` WHERE `movie_id`=$divide_bookmark[$i]"));	
}
				
if (isset($_POST['bookmarkbtn'])) 
	{
		$getvalue2=($_POST['bookmark_movie_id']);
		if(empty($user_data['bookmark_movie_id'])===true)
		{	

			mysqli_query($link,"UPDATE `users` SET `bookmark_movie_id`='$getvalue2' WHERE `user_id`=$session_user_id");
			echo "<script>alert('Bookmarked!')</script>";
		}
		else
		{	
			
			if(empty($getvalue2) === false)
			{
				if(empty($getvalue2)=== false && empty($errors) === true)
				{
					for($i=0;$i<$how_many_bookmark;$i++)
					{	
						if($divide_bookmark[$i] == $getvalue2)
						{
							$errors[]="Already bookmarked";
							echo "<script>alert('Already bookmarked!')</script>";
							break;
						}
						else
						{
							continue;
						}
						break;
					}	
				}
				if(empty($errors) === true)
				{

					mysqli_query($link,"UPDATE `users` SET `bookmark_movie_id`='".$user_data['bookmark_movie_id'].",".$getvalue2."'"."WHERE `user_id`=$session_user_id");
					echo "<script>alert('Bookmarked!')</script>";

				}		

			}
			
			
		}
		

	}
?>
<!DOCTYPE html> 
<html>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="HandheldFriendly" content="true">
<head>
<title>Movie Mart</title>
				<link rel="stylesheet" type="text/css" href="../css/Home.css">
				<link rel="stylesheet" type="text/css" href="../css/Style0.css">
					<link rel="stylesheet" type="text/css" href="../css/Style1.css">
				<link rel="icon" href="../icons/Logo player.png">
						<link rel="stylesheet" type="text/css" href="../css/nightmodeswitch.css">
							<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
							<script src="../Scripts/jquery-ui.js"></script>
							
							<div id="fb-root"></div>
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="nRsoHqq5"></script>

							<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
							
						</head>
						<body id="night"  style="">
							<section id="1">
								<header>
									<div align="center"\\ id="mySidenav" class="sidenav">
									<!-- <a href="Microanime.html" class="logo">Movie
									<text class="changecolor" style="">Mart</text></a>
				 -->
										<a href="../ContactFrom_v2/index.html">
											<text>C</text>ontact
										</a>
										<a href="List.php">
											<text>B</text>rowse
										</a>
										<a href="aboutus.html">
											<text>A</text>bout
										</a>
										</div>
											
										</header>
							</section>

			<div draggable="true" style="position:fixed;width:100%;z-index:2">
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
											
											
											<div style="display:block">
								
										
											<div class="banner-container">
								
											
					
												<div class="header">
													<table style="background-color:none;width:100%;">
													<tr>
													<td class="barcontainer">
													<a class="main" >
														<div  onclick="toggleNav()">
															<div class="container1">
																<div class="bar1"></div>
																<div class="bar2"></div>
																<div class="bar3"></div>
															</div>
														
														
														</div>
													</a>
													
																						
											<div class="theme-switch-wrapper" align="center" style="position:relative;width:100%;heigh:100%;">											
												<label class="switch">
												<input  id="switch" type="checkbox">
													<span class="slider round"></span>
												</label>
												
											</div>
											</td>
													<td style="background-color:none;width:90%;">
									<div class="header-right">
													
														
														<div style="" class="volumecontainer"><a id="volume" onclick="toggle()"><i class="fas fa-volume-up"></i></a></div>
										<div class="usercontainer"><a class="signin" href="#" onclick="document.getElementById('id01').style.display='block'">
													<i class="fas fa-user"></i>
												</i>
											</a>
										</div>
					



													
										</div>
											
												</td>
												<td>
						<div class="sharecontainer">
						<div class="fb-share-button" data-href="http://moviemart.epizy.com" data-layout="button_count" data-size="small"><a target="_blank" href="	https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Fmoviemart.epizy.com%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share
							</a>
						</div>
					</div>
												</td>
													</tr>
													</table>
													
												</div>
									
											
<div  class="minioverlay main">
<span>
<button class="overlaybtn one active"  onclick="" ><i class="fas fa-image"></i></button>
<button class="overlaybtn two"  onclick="" ><i class="fas fa-video"></i></button>
</span>
<span class="overlaytext"><p style="">This website is in alpha stage, stuffs will break!</p></span>
</div>
<section>
										<div id="video-div" class="zoom" style="display:none" align="center" style="">
										<div class="overlay fade"></div>
											<video id="bannervideo1"   onclick="PlayPause()" autoplay="true" muted loop src='../videos/banner1.mp4'></video>
											<div id="pauselogo" class="animate" onclick="PlayPause()">
												<img align="center" style="" src="../icons/paused.png">
												</div>
												<div id="playlogo" class="animate1" onclick="PlayPause()">
													<img align="center" style="" src="../icons/play.png">
													</div>
													<div id="dots">
														
															<span id="dot1" onclick="slide1()"></span>
													
														
															<span id="dot2" onclick="slide2()"></span>
														
														
															<span id="dot3" onclick="slide3()"></span>
														
														
															<span id="dot4" onclick="slide4()"></span>
														
														
															<span id="dot5" onclick="slide5()"></span>
														
													</div>
										</div>
</section>	
<div id="imagetab" style="display:block;">	
<div class="banner">
<div class="overlay fade">
</div>
<div class="slide zoom"><img  class="" src="../css/imgs/moana.jpg" style="width:100%"></div>

</div>
						
<div class="banner">
<div class="overlay fade">
</div>
 <div class="slide zoom"><img  class="" src="../css/imgs/sonic4k.jpg" style="width:100%"></div>
 
</div>

<div class="banner">
<div class="overlay fade">
</div>
  <div class="slide zoom"><img  class="" src="../css/imgs/capmarvel.jpg" style="width:100%"></div>
</div>

<div class="banner">
<div class="overlay fade">

</div>
 <div class="slide zoom"><img  class="" src="../css/imgs/standbyme.jpg" style="width:100%"></div>
</div>

<div class="banner">
<div class="overlay fade">
</div>
    <div class="slide zoom"><img  class="" src="../css/imgs/bighero6.jpg" style="width:100%"></div>
</div>


<div class="banner">
<div class="overlay fade">

</div>
<div class="slide zoom"><img  class="" src="../css/imgs/angry2.jpg" style="width:100%"></div>
</div>

<div class="banner">
<div class="overlay fade">

</div>
 <div class="slide zoom"><img class="" src="../css/imgs/ralph2.jpg" style="width:100%"></div>
</div>

<!-- <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a> -->
									<div style="text-align:center;position:absolute;width:100%;bottom:1%;display:none;">
											<span class="dot" ></span> 
											<span class="dot" ></span> 
											<span class="dot" ></span> 
											<span class="dot" ></span> 
											<span class="dot" ></span> 
											<span class="dot" ></span> 
											<span class="dot" ></span> 
											<span class="dot" ></span> 
											</div>	
</div>											
										
</div>

</div>
<div class="containercontainer">
<div style="" class="topiccontainer">
<table id="mytopicContainer" style="border:0px;padding:0px;margin:0px;background-color:transparent;width:100%;">
<tr>
<td style="min-width:0.5%;width:0.5%;" class="liner" ></td>
<td  style="background-color:none;width:auto">
<p onclick="filterSelection('all')" class="topic filteractive">List all</p>
</td>

<td style="background-color:transparent;width:auto">
<p onclick="filterSelection('movies')" class="topic">Movies</p>
</td>

<td style="background-color:transparent;width:auto">
<p onclick="filterSelection('series')" class="topic">TV Series</p>
</td>


<td align="center;" class="responsive" style="background-color:transparent"></td>
<td align="center;" style="position:relative;width:1%;background-color:transparent">
<div id="lastdiv"  style="display: flex;align-items: center;justify-content: center;">

<button id="loadmore" name="loadmore" onclick="window.location.href='List.php'" value="" class="loadmore">
					<i class="fas fa-caret-down"></i>
								</button>
							

							</div>
</td>
<td align="center;" style="position:relative;width:15%;background-color:transparent">
<div class="searchboxcontainer">
<!-- <input id="searchbox" class="searchbox" onkeyup="search()" type="text" name="search" placeholder="search..."> -->
<td>
	<p onclick="showsbox()" class="topic"><i class="fas fa-search"></i></p>	
</td>
</div>
</td>

<td align="center;" style="position:relative;width:3%;background-color:transparent">
<div><p class="topic">&nbsp;</p></div>
</td>
<td style="min-width:0.5%;width:0.5%;"class="liner-inverse" ></td>
</tr>
</table>
</div>
</div>

																				

	<div align="center" id="maincontent" class="Flexbox1">

						<?php
						
						for($i=0;$i<$row;$i++)						 						 
						{
							$column=mysqli_fetch_assoc($query);	
						?> 
									
 	<div class="li animate <?php echo $column['class']?>">
	<div class="card " onclick="">
	<form action="../Sub Pages/createpage.php" method="get">
	<input type="hidden"  name='movie_id' value="<?php echo $movieid=$column['movie_id']?>">
	<button class="moviebtn" name="movie_btn" style="border: none;background-color: transparent;">
		<div class="crop"><?php echo '<img class="image" src='.$column['image'].'>'; ?></div>
	</button>
	</form>
												<div class="container">
				<p style="color:#FFB738;">IMDB <text style="color:grey;"><?php echo $column['rating'] ?></text></p>
													<h4>
														<p><?php echo $column['movie_name'] ?></p>	</h4>
						<p style="overflow:auto;max-height:20px;max-width: 140px;"><?php 
						if(empty($column['sub_title'])===true)
						{
							echo "----";
						}
						else
						{
							echo $column['sub_title'];
						}
						?></p>

<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
<input name="bookmark_movie_id" value="<?php echo $column['movie_id']?>" type="hidden">
<button style="display: flex;justify-content: center;align-items: center;"type="submit" name="bookmarkbtn" class="btnstyle">
<i class="fas fa-heart"></i>
</button>
</form>
														
												
													
												</div>
										</div>
									</div>
						<?php } ?>


						</div>
				

																	

															


<script src="../Scripts/javascript.js"></script>
<script>
var a =document.getElementById("s-btn");
var b=document.getElementById("search-box");
var c=document.getElementsByClassName('search-text');
var d=document.getElementById("search-txt");
a.addEventListener("click", function()
  {
  
  	if(b.style.width==='310px')
  	{
  		b.style.width='40px';
  		d.style.width='0px';
  		d.style.display='none';
  		c[0].style.width='0';		
  	}
  	else
  	{
  		b.style.width='310px';
  		c[0].style.width='90%';
  		d.style.width='90%';
  		d.style.display='block';

  	}
  });


</script>
						<footer id="footer">
						<div style="float:left;position:absolute;top:10px;left:10px;font-family:'Good Times';color:grey;">Movie 
							<text class="changecolor">Mart</text>
						</div>
						<div>
							<a class="footer-text" href="#">
								<div class="footer" align="center">This website is for educational purpose only</div>
							</a>
						</div>
					</footer>
																	</body>
																
																	
																</html>


