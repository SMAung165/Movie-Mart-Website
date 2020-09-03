<?php
session_start();
require 'Database/connect.php';
require 'functions/users.php';
require 'functions/general.php';
if(logged_in()===true)
{
	$session_user_id =$_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'profile', 'username', 'password', 'first_name', 'last_name', 'email');
	if (user_active($user_data['username'])===false)
	{
		session_destroy();
		header('Location:index.php');
	}		
}
/* error_reporting(0); */
$errors = array();
$success=null;
?>