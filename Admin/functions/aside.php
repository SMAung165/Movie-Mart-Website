<?php 
	if(logged_in()===true)
	{
		include('widgets/active.php');
		
	}
	else
	{
		include ('widgets/login.php');
	}
?>