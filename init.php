<?php
session_start();
require 'Database/connect.php';
include 'functions/users.php';
require 'functions/general.php';
if(logged_in()===true)
{
	$session_user_id =$_SESSION['user_id'];
	$user_data = user_data($session_user_id, 'user_id', 'profile', 'username', 'password', 'first_name', 'last_name', 'email','bookmark_movie_id');
	if (user_active($user_data['username'])===false)
	{
		session_destroy();
		header('Location:../functions/logout.php');
	}		
}
/* error_reporting(0); */
$errors = array();
$reg_errors=array();
$success=array();
?>