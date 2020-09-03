<?php
require '../init.php';
if(logged_in()===false)
{
    header("location:../index.php");
    exit;
}
if (isset($_GET['movie_btn'])) 
{ 
$movie_id=$_GET['movie_id'];
$query=mysqli_query($link,"SELECT  * FROM `movies` WHERE `movie_id`=$movie_id");
$row =mysqli_fetch_assoc($query);
$video_link=(string)$row['video'];
$link_divide=explode(',',$video_link);
$how_many_links=(int)(count($link_divide));
?>
<!DOCTYPE html> 
<html>
	<head>
		<title><?php echo $row['movie_name']." ".$row['sub_title']?></title>
			<link rel="icon" href="../icons/Logo player.png">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
			<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
				<meta name="HandheldFriendly" content="true">
			<link rel="stylesheet" type="text/css" href="../css/GC.css">
				<link rel="stylesheet" type="text/css" href="../css/Style1.css">
				<script src="https://www.powr.io/powr.js?platform=embed"></script>
				<link rel="stylesheet" type="text/css" href="../css/Style0.css">
						<link rel="stylesheet" type="text/css" href="../css/nightmodeswitch.css">
						<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
							<meta name="viewport" content="width=device-width, initial-scale=1">
			<div id="fb-root"></div>
			<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="nRsoHqq5"></script>
								<script src="../Scripts/jquery-1.12.4.js"></script>
								<script src="../Scripts/jquery-ui.js"></script>
								<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
							</head>
							<body>
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
																		echo '<img src="',$user_data['profile'], '"alt="',$user_data['first_name'],'\'s Profile Image">';
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

<div class="topiccontainer">
<table border="0" id="mytopicContainer" style="border:0px;padding:0px;margin:0px;width:100%;">
<tr>
<td  style="background-color:none;width:auto">
<p onclick="window.location.href='../Main Pages/Microanime.php'" class="topic">Home</p>
</td>

<td style="background-color:transparent;width:auto">
<p onclick="window.location.href='../Main Pages/List.php'" class="topic">Browse</p>
</td>

<td><div class="theme-switch-wrapper" align="center" style="position:relative;width:auto;">										
												
												<label class="switch">
												<input  id="switch" type="checkbox">
													<span class="slider round"></span>
												</label>
												
											</div>
											</td>
<td align="center;" class="responsive" style="background-color:transparent"></td>
<td align="center;" >
<div><a class="topic signin"><i class="fas fa-user"onclick="document.getElementById('id01').style.display='block'"></i></a></div>
</td>
</table>
</div>
										<div style="padding:0;margin:0;"align="center">
										
							<iframe id="tv" style="width:100%;position:relative" src="<?php echo $link_divide[0];?>" frameborder="0" scrolling="0" allowfullscreen></iframe>
										</div>	
<div style=" position: -webkit-sticky;position: sticky;"class="topiccontainer">
<table border="0" id="mytopicContainer" style="border:0px;padding:0px;margin:0px;background-color:transparent;width:100%;">
<tr>
<td style="min-width:0.5%;" class="liner"></td>
<td align="center" style="width:99%">
<p id="custom" onclick="togglecollapse()" style="margin-left:0;"class="topic"><i class="far fa-circle custom"></i></p>
</td>
																<div align="center"id="content">
																	<p><?php echo $row['story'];?></p>
																</div>
<td style="min-width:0.5%;" class="liner-inverse">
</td>
</tr>
</table>
</div>
<div class="comment-box" align="center">
<!-- <div class="fb-comments" data-href="http://moviemart.epizy.com/Sub%20Pages/createpage.php?movie_id=<?php echo $movie_id?>&movie_btn=" data-numposts="5" data-width="" data-colorscheme="light"></div> -->
<div class="powr-comments" id="14873076_1598292353_<?php echo $movie_id?>"></div>
</div>

<div  id="" class="Episodes" >
<?php for($i=0;$i<$how_many_links;$i++)
	{
			if($i>=0)
			{
				for($a=1;$a<=$i;$a++){$a;}
			}
		for($b=0;$b>=$i;$b++)
		{
			$b="btnactive";
			break 1;
		}
		

			
		 echo "<div class='ep ".$b."'"."onclick='change_episode".$i."()'".">"."<p>Episode ".$a."</p>"."</div>";

	}?>
	
</div>

<script type="text/javascript" src="../Scripts/newjavascript.js"></script>
<script>
<?php 
	for($i=0;$i<$how_many_links;$i++)
	{
		$part2="d.src=".'"'.$link_divide["$i"].'"';
		echo "function change_episode".$i."()"."{var d =document.getElementById('tv');".$part2.";}"." ";
	}

 ?>

    $("document").ready( function () {
        alert("Consider enabling ads blocker, there are inappropriate ads from the stream server!");
    }); 


</script>

													

														<footer id="footer">
																		<div style="float:left;position:absolute;top:10px;left:10px;font-family:'Good Times';color:grey;">Movie 
																			<text class="changecolor">Mart</text>
																		</div>
																		<div>
																			<a class="footer-text" href="#">
																				<div class="footer" align="center">This Page(HTML) was designed by S.M.A</div>
																			</a>
																		</div>
																	</footer>
														</body>													
													</html> 
<?php }?>