<?php 
require_once('../init.php');
	if(logged_in()===true)
	{
		include('../widgets/profile.php');
		
	}
	else
{
    header('location:../index.php');
    exit;
}
?>