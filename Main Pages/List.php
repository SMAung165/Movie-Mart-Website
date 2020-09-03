<?php require '../init.php';
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
<head>
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">
<link rel="icon" href="../icons/Logo player.png">
<link rel="stylesheet" type="text/css" href="../css/Style0.css">
<link rel="stylesheet" type="text/css" href="../css/Style1.css">
<link rel="stylesheet" type="text/css" href="../css/GC.css">
<script src="../Scripts/jquery-1.12.4.js"></script>
<script src="../Scripts/jquery-ui.js"></script>
<link rel="stylesheet" type="text/css" href="../css/nightmodeswitch.css">

<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
<title>Movie Mart</title>
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
			<div style="position:fixed;width:100%;z-index:1">
			<div id="draggable" class="animate"style="" class="ui-widget-content">
			<div id="search-box">
			<div class="search-text">
			<input align="center" onkeyup="search()" id="search-txt" type="text" placeholder="Enter text here">
			</div>
			<div style="z-index:1;">
			<a id="s-btn"style="">
			<i class="fas fa-search"></i>
			</a>
			</div>
			</div>
			</div>
			</div>																
<div class="topiccontainer">
<span border="0" id="mytopicContainer" class="menubar" style="">

<div class="item">
<p onclick="window.location.href='../Main Pages/Microanime.php'" class="topic">Home</p>
</div>
<div class="item">
<p onclick="window.location.href='../Main Pages/List.php'" class="topic">Browse</p>
</div>

<div class="item">
<a onclick="showsbox()" class="topic">Search</a>
</div>

<div class="item">
<div class="theme-switch-wrapper" align="center" style="">					
<label class="switch">
<input  id="switch" type="checkbox">
<span class="slider round"></span>
</label>

</div>
</div>
<div class="item">
<a class="topic signin">
<i class="fas fa-user"onclick="document.getElementById('id01').style.display='block'">		
</i>
</a>
</div>

</span>
</div>


<div align="center" id="maincontent" class="Flexbox1">

						<?php
						$query=mysqli_query($link,"SELECT * FROM `movies`");
						$row =mysqli_num_rows($query);
						for($i=1;$i<=($row);$i++)						 						 
						{
							$column=mysqli_fetch_assoc($query);	
						?> 
									
 	<?php echo "<div style='display:none' class='li animate ".$column['class']."'".">";?>
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
						<button type="submit" name="bookmarkbtn" class="btnstyle">
						<i style="" class="fas fa-plus"></i>
						</button>
						</form>
														
												
													
												</div>
										</div>
									</div>
						<?php } ?>

							<div id="lastdiv" align="center"  style="">
							
							
								<button id="loadmore" name="loadmore" onclick="buttonClick()" value="0" class="loadmore">
									<i class="fas fa-caret-down"></i>
								</button>
							

							</div>	
			</div>
		
													
	<!-- <div id="lastdiv" align="center"  style="">
		<button onclick="window.location.href='List.php?#'" class="loadmore">
			<i class="fas fa-caret-down"></i>
		</button>
	</div>
-->
													
	
	<!-- <div align="center" style="border-radius:0px;width:100%;background-color:none;position:absolute;top:10%;left:0%;outline:none;"><audio controls="" style="width:20%;border-radius:0%;color:grey;decoration:none;"><source src="../../../music/1-800-273-8255_Logic, Alessia Cara, Khalid_-1076229117.mp3" type="audio/mpeg"></audio></div> -->
								<script>
var fold=document.getElementsByClassName('li');
var condition = document.getElementById("maincontent");	
var loadmore=document.getElementById("loadmore").value;


var viewport = window.matchMedia("(min-height: 1000px)")
show_all(viewport) 
viewport.addListener(show_all)
function show_all()
	{
		if (viewport.matches) 
		{
			for (var b=0;b<(<?php echo (int)($row);?>);b++)
			{
				fold[b].style.display='flex';
			}	
		}	
	}

var i = 10; 
for(var b=0;b<i;b++)
{
	fold[b].style.display='flex';
} 
   function buttonClick(increment) 
   {
        increment = i+=5;
        for(var a=0;a<i;a++)
		{
			fold[a].style.display='flex';
		}
   }

var a =document.getElementById("s-btn");
var b=document.getElementById("search-box");
var c=document.getElementsByClassName('search-text');
var d=document.getElementById("search-txt");
a.addEventListener("click", function()
  {
  
  	if(b.style.width=='310px')
  	{
  		b.style.width='40px';
  		d.style.width='0';
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
            cardli[i].style.display = "";
        } 
        else 
        {
            cardli[i].style.display = "none";
        }
    }
}

function switchTheme(e) {
if (e.target.checked) {
document.documentElement.setAttribute('data-theme', 'dark');
}
else {
document.documentElement.setAttribute('data-theme', 'light');
}    
}
const toggleSwitch = document.querySelector('.switch input[type="checkbox"]');
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

if (currentTheme === 'dark') 
{
toggleSwitch.checked = true;
}
}

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


