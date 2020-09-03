<html>
<div class="heading">
<?php
echo "Welcome! Admin : "." ".$user_data['username'];
echo "<br><br>";
?></div>

<div class="dot"></div>	
<br>
<!-- We currently have ".user_count()." registered -->
<div class="profile">
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
if(empty($user_data['profile'])=== false)
{
	echo '<img src="',$user_data['profile'], '"alt="',$user_data['first_name'],'\'s Profile Image">';
}
	
?>
<?php

$movie_id=null;
$queried_movie=null;
$query=mysqli_query($link,"SELECT * FROM `movies`");
$how_many_rows=mysqli_num_rows($query); 
	if(isset($_POST['query_movie'])===true)
	{
		 $movie_id = $_POST['movie_id'];
		 $queried_movie = mysqli_fetch_assoc(mysqli_query($link,"SELECT * FROM `movies` WHERE `movie_id`=".(int)$movie_id));

	}
 	
?>
<?php

if(isset($_POST['update_movies']))
{
	$movie_id =$_POST['movie_id'];
	$image = $_POST['image'];
	$movie_name= $_POST['movie_name'];
	$sub_title = $_POST['sub_title'];
	$class = $_POST['class'];
	$video = $_POST['video'];
	$story = $_POST['story'];
	$rating = $_POST['rating'];
	mysqli_query($link,"UPDATE `movies` SET `video` = '$video', `image` = '$image', `movie_name` = '$movie_name', `sub_title` = '$sub_title', `class` = '$class', `story` = '$story', `rating` = '$rating' WHERE `movie_id`=".(int)$movie_id);
	header("Location:".$_SERVER['PHP_SELF']);
	exit();	
}

?>

<?php

function add_movie($register_data)
{
	global $link;
	array_walk($register_data, 'array_sanitize');
	$fields='`'.implode('`,`',array_keys($register_data)).'`';
	$data = '\''. implode('\', \'', $register_data).'\'';
	mysqli_query($link,"INSERT INTO `movies` ($fields) VALUES ($data)");
	
}

if(isset($_POST['delete_movie']))
{
			$movie_id = $_POST['movie_id'];
			$exploded=explode(",",$movie_id);
			$how_many_exploded=count($exploded);
			for($i=0;$i<=$how_many_exploded;$i++)
			{
				if(($i<$how_many_exploded) === true)
				{
					mysqli_query($link,"DELETE FROM `movies` WHERE `movies`.`movie_id`=".(int)$exploded[$i]);	
				}
				else
				{
					header("Location:".$_SERVER['PHP_SELF']."?success");
					exit();
				}
			}					
}

if(isset($_POST['Insert_movies']))
{
		
			$register_data =array
			(
				'image' 		=> $_POST['image'],
				'movie_name' 	=> $_POST['movie_name'],
				'sub_title' 	=> $_POST['sub_title'],
				'class' 		=> $_POST['class'],
				'video' 		=> $_POST['video'],
				'story' 		=> $_POST['story'],
				'rating' 		=> $_POST['rating'],
			);
			add_movie($register_data);
			header("Location:".$_SERVER['PHP_SELF']."?success");
			exit();
			
	 	

}
?>
<?php

?>
<form action="" method="post" enctype="multipart/form-data">
<input type="file" name="profile"><input type="submit">
</form>
</div>
</br>
<head>
<style>
.heading
{
	width: 100%;
	text-align: center;
	height:200px;
	display: flex;
	font-size: 40px;
	justify-content: center;
	align-items: center;
}
body
{
	height: 100vh;
	font-family: Calibri;
	padding: 0;
	margin: 0;
}
body button
{
	border:0;
	border-radius: 10px;
	padding: 10px;
	transition: 0.5s;
	cursor: pointer;
	margin:20px;
	box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
}
body button:hover
{
	background-color:#03f0fc;
	box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
}
body button:active
{
	background-color:transparent;
	box-shadow: 0px 0px 0px rgba(0,0,0,0.0);
	transition: 0s;
}
table
{
	width: 100%;
	text-align: center;
	display: block;
	color:black;

}
table tr
{
	
}
table td
{
	background: linear-gradient(to bottom, #e4e4e4 60%, #000000 259%);
	border-radius: 10px;
}
table tr td
{
	width:auto;
}
.header tr td
{
	padding:10px;
}
.image
{
	width:100px;
	height:auto;
}
.profile img
{
	width:100px;
	margin:0px;
}
.profile
{
	display: none;
	background-color:#f9f9f9;
	border:1px dashed #ccc;
	padding:10px;
}
.form_insert,.form_update
{
	align-items:center;
	flex-wrap:wrap;
	justify-content:center;
	width:100%;
	padding-bottom:20px;
}
.form_insert
{
	display:none;
}
.form_update
{
	display:flex;
}
.form_insert input,textarea, .form_update input,textarea
{
	padding: 10px;
	border-radius: 10px;
	outline: none;
	box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
}
.form_insert ul,.form_update ul
{
	list-style-type:none;
	display:flex;
	margin:0;
	justify-content: center;
	flex-wrap:wrap;padding:5%;
}
.form_insert ul li,.form_update ul li
{
	margin:20px;
}
.form_insert ul li input,.form_update ul li input
{
	width:300px;

}
.delete_box
{
	margin: 20px;
	display: none;
	justify-content: center;
	align-items: center;
}
.delete_box input
{
	width: 200px;
	padding: 10px;
	border-radius: 10px;
	outline: none;
	box-shadow: 0px 8px 16px rgba(0,0,0,0.2);
}
.btncontainer
{
	display: flex;
	width: 100%;
	justify-content: center;
	align-items: center;
}
.dot{display:none;background-color:rgba(0,255,0,0.5);width:20px;height:20px;border-radius:100%;}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="../css/Style1.css">
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v8.0" nonce="nRsoHqq5"></script>
							<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
</head>
<body>


<div class="btncontainer">
	<button onclick="window.location.href='widgets/changepassword.php'">Change Password</button>
	<button onclick="window.location.href='functions/logout.php'">Logout</button>
	<button onclick="toggle_table()">Hide/Show Table</button>
	<button onclick="toggle_data_form()">Insert Data</button>
	<button onclick="toggle_data_form_update_table()">Update</button>
	<button onclick="toggle_delete_box()">DELETE</button>
</div>

<div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"	class="delete_box animate">
	<label>DELETE,movie_id : <input type="" placeholder="Use comma if more than one!"id="movie_id" name="movie_id"></label>
	<button name="delete_movie" type="submit">DROP</button>
</form>



<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>"class="form_insert animate">
<div style="width: 100%;text-align: center;"><h1>INSERT DATA</h1></div>
	<ul style="">
	<li>
		<p>image : <input  id="image" name="image" required placeholder="url or location..."> <text onclick="lock_input_image()" style="color:grey;cursor:pointer;"><i class="fas fa-lock"></i></text></p>
	</li>
		<li>
			<p>movie_name : <input id="movie_name" name="movie_name"  placeholder="name of the movie..." required> <text onclick="lock_input_movie_name()" style="color:grey;cursor:pointer;"><i class="fas fa-lock"></i></text></p>
		</li>
		<li>
			<p>class : <input id="class" name="class" placeholder="category, use 'series' or 'movies' only..." required> <text onclick="lock_input_class()" style="color:grey;cursor:pointer;"><i class="fas fa-lock"></i></text></p>
		</li>
		<li>
			<p>sub_title : <input id="sub_title" name="sub_title" placeholder="sub of the movie..." required> <text onclick="lock_input_sub_title()" style="color:grey;cursor:pointer;"><i class="fas fa-lock"></i></text></p>
		</li>
		<li>
			<label>video :</label> <textarea id="video" name="video" placeholder="urls, use comma if more than one..." rows="10" cols="100"  required></textarea>
			<text onclick="lock_input_video()" style="color:grey;cursor:pointer;"><i class="fas fa-lock"></i></text>
		</li>
		<li>
			<label>story :</label> <textarea id="story" name="story" rows="10" placeholder="story of the movie..." cols="100"  required></textarea>
			<text onclick="lock_input_story()" style="color:grey;cursor:pointer;"><i class="fas fa-lock"></i></text>
		</li>
		<li>
			<p>rating : <input id="rating" name="rating" placeholder="rating..." required> <text onclick="lock_input_rating()" style="color:grey;cursor:pointer;"><i class="fas fa-lock"></i></text></p>
		</li>

	</ul>


	<button id="button" name="Insert_movies" type="submit">INSERT</button>


</form>
</div>
<div>
<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>" class="form_update animate">
<div style="width: 100%;text-align: center;"><h1>SELECT MOVIE ID</h1></div>
	<ul style="">
		<li>
			<p>movie_id : <input name="movie_id"  placeholder="id of the movie you want to update..." required></p>
		</li>
	</ul>
	<button id="button2" name="query_movie" type="submit">Query</button>
</form>
</div>
<?php

if(empty($queried_movie)===false)
{?>
<div>
<div style="width: 100%;text-align: center;"><?php echo $success ?></div>
<form class="form_update animate" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">

<div style="width: 100%;text-align: center;"><h1>UPDATE DATA</h1>

<div><h3>Movie ID : <?php echo $queried_movie['movie_id']?></h3></div>
</div>
<div style=""><h4 style="color:red">Cation! : For Every " ' " please use " \' ".</h4></div>
	<ul style="">	
			<li>
				<input type="hidden" value="<?php echo $queried_movie['movie_id']?>" class="movie_id" name="movie_id">
			</li>
		<li>
			<p>image : <input  value="<?php echo $queried_movie['image']?>" class="image" name="image"  placeholder="url or location..."> <text onclick="lock_input_image_update()" style="color:grey;cursor:pointer;"><i class="fas fa-lock"></i></text></p>
		</li>
		<li>
			<p>movie_name : <input  value="<?php echo $queried_movie['movie_name']?>" class="movie_name" name="movie_name"  placeholder="name of the movie..." > <text onclick="lock_input_movie_name_update()" style="color:grey;cursor:pointer;"><i class="fas fa-lock"></i></text></p>
		</li>
		<li>
			<p>class : <input value="<?php echo $queried_movie['class']?>" class="class" name="class" placeholder="category, use 'series' or 'movies' only..." > <text onclick="lock_input_class_update()" style="color:grey;cursor:pointer;"><i class="fas fa-lock"></i></text></p>
		</li>
		<li>
			<p>sub_title : <input value="<?php echo $queried_movie['sub_title']?>" class="sub_title" name="sub_title" placeholder="sub of the movie..." > <text onclick="lock_input_sub_title_update()" style="color:grey;cursor:pointer;"><i class="fas fa-lock"></i></text></p>
		</li>
		<li>
	<label>video :</label><textarea class="video" name="video" placeholder="urls, use comma if more than one..." rows="10" cols="100"><?php echo $queried_movie['video']?></textarea>
			<text onclick="lock_input_video_update()" style="color:grey;cursor:pointer;"><i class="fas fa-lock"></i></text>
		</li>
		<li>
	<label>story :</label><textarea class="story" name="story" rows="10" placeholder="story of the movie..." cols="100"><?php echo $queried_movie['story']?></textarea>
			<text onclick="lock_input_story_update()" style="color:grey;cursor:pointer;"><i class="fas fa-lock"></i></text>
		</li>
		<li>
			<p>rating : <input value="<?php echo $queried_movie['rating']?>" class="rating"  name="rating" placeholder="rating..." > <text onclick="lock_input_rating_update()" style="color:grey;cursor:pointer;"><i class="fas fa-lock"></i></text></p>
		</li>

	</ul>


	<button id="button3" name="update_movies" type="submit">UPDATE</button>


</form>
</div>
<?php } ?>



<table style="" class="header animate" >
	<tr >
		<td>image</td>
		<td>movie_id</td>
		<td>movie_name</td>
		<td>class</td>
		<td>sub_title</td>
		<td>video</td>
		<td>story</td>
		<td>rating</td>	
	</tr>
<?php  


	
	for($i=0;$i<$how_many_rows;$i++)
	{
		$column = mysqli_fetch_assoc($query);?>


			
			<tr>
				<td>
					<div height="10%;"><img class="image" src="<?php echo $column['image']?>"></div>
				</td>
				<td>
					<p><?php echo $column['movie_id']?></p>
				</td>
				<td>
					<p><?php echo $column['movie_name']?></p>
				</td>
				<td>
					<p><?php echo $column['class']?></p>
				</td>
				<td>
					<p><?php echo $column['sub_title']?></p>
				</td>
				<td>
					<p style="text-align: justify;max-width:80%;margin:auto"><?php echo $column['video']?></p>
				</td>
				<td>
					<p style="text-align: justify;max-width:80%;margin:auto;"><?php echo $column['story']?></p>
				</td>
				<td>
					<p><?php echo $column['rating']?></p>
				</td>
			</tr>
		

	<?php }?>
	</table>
</body>
	<script>
function lock_input_image()
{

	var input=document.getElementById("image");
	if(input.disabled===true)
	{
		input.disabled=false;
	}
	else
	{
		input.disabled=true;
	}
}
function lock_input_movie_name()
{

	var input=document.getElementById("movie_name");
	if(input.disabled===true)
	{
		input.disabled=false;
	}
	else
	{
		input.disabled=true;
	}
}
function lock_input_class()
{

	var input=document.getElementById("class");
	if(input.disabled===true)
	{
		input.disabled=false;
	}
	else
	{
		input.disabled=true;
	}
}
function lock_input_sub_title()
{

	var input=document.getElementById("sub_title");
	if(input.disabled===true)
	{
		input.disabled=false;
	}
	else
	{
		input.disabled=true;
	}
}
function lock_input_story()
{

	var input=document.getElementById("story");
	if(input.disabled===true)
	{
		input.disabled=false;
	}
	else
	{
		input.disabled=true;
	}
}
function lock_input_video()
{

	var input=document.getElementById("video");
	if(input.disabled===true)
	{
		input.disabled=false;
	}
	else
	{
		input.disabled=true;
	}
}
function lock_input_rating()
{

	var input=document.getElementById("rating");
	if(input.disabled===true)
	{
		input.disabled=false;
	}
	else
	{
		input.disabled=true;
	}
}









function lock_input_image_update()
{

	var input=document.getElementsByClassName("image")[0];
	if(input.disabled===true)
	{
		input.disabled=false;
	}
	else
	{
		input.disabled=true;
	}
}
function lock_input_movie_name_update()
{

	var input=document.getElementsByClassName("movie_name")[0];
	if(input.disabled===true)
	{
		input.disabled=false;
	}
	else
	{
		input.disabled=true;
	}
}
function lock_input_class_update()
{

	var input=document.getElementsByClassName("class")[0];
	if(input.disabled===true)
	{
		input.disabled=false;
	}
	else
	{
		input.disabled=true;
	}
}
function lock_input_sub_title_update()
{

	var input=document.getElementsByClassName("sub_title")[0];
	if(input.disabled===true)
	{
		input.disabled=false;
	}
	else
	{
		input.disabled=true;
	}
}
function lock_input_story_update()
{

	var input=document.getElementsByClassName("story")[0];
	if(input.disabled===true)
	{
		input.disabled=false;
	}
	else
	{
		input.disabled=true;
	}
}
function lock_input_video_update()
{

	var input=document.getElementsByClassName("video")[0];
	if(input.disabled===true)
	{
		input.disabled=false;
	}
	else
	{
		input.disabled=true;
	}
}
function lock_input_rating_update()
{

	var input=document.getElementsByClassName("rating")[0];
	if(input.disabled===true)
	{
		input.disabled=false;
	}
	else
	{
		input.disabled=true;
	}
} 

















		function toggle_table()
		{
			var table=document.getElementsByTagName("table")[0];

			if(table.style.display==="none")
			{
				table.style.display="block";
			}
			else
			{
				table.style.display="none";
			}
		}


			function toggle_data_form()
		{
			var form=document.getElementsByClassName("form_insert")[0];

			if(form.style.display==="flex")
			{
				form.style.display="none";
			}
			else
			{
				form.style.display="flex";
			}
		}

			function toggle_delete_box()
		{
			var form=document.getElementsByClassName("delete_box")[0];

			if(form.style.display==="flex")
			{
				form.style.display="none";
			}
			else
			{
				form.style.display="flex";
			}
		}

			function toggle_data_form_update_table()
			{
				var form_update=document.getElementsByClassName("form_update");

				if(form_update[0].style.display==="none")
				{
					form_update[0].style.display="flex";
					form_update[1].style.display="flex";
				}
				else
				{
					form_update[0].style.display="none";
					form_update[1].style.display="none";
				}
			}
	</script>
	</html>