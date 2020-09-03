<?php


function mysqli_result($res, $row, $field=0) 
{ 
    $res->data_seek($row); 
    $datarow = $res->fetch_array(); 
    return $datarow[$field]; 
}
function upload_profile_image($session_user_id, $file_temp,$file_extension)
{
	global $link;
	$file_path= '../images/profile/'.substr(md5(time()),0,10).'.'.$file_extension;
	move_uploaded_file($file_temp, $file_path);
	mysqli_query($link,"UPDATE `users` SET `profile`='$file_path' WHERE `user_id`=" . (int)$session_user_id);
}
function register_profile_image( $file_temp,$file_extension)
{
	global $link;
	$file_path= '../images/profile/'.substr(md5(time()),0,10).'.'.$file_extension;
	move_uploaded_file($file_temp, $file_path);
	mysqli_query($link,"INSERT INTO `users` (`profile`) VALUES ('$file_path')");
}
function change_password($user_id, $password)
{
	global $link;

	$user_id=(int)$user_id;
	$password=md5($password);
	
	mysqli_query($link,"UPDATE `users` SET `password`='$password' WHERE `user_id`=$user_id");
}
function register_user($register_data)
{
	global $link;

	array_walk($register_data, 'array_sanitize');
	$register_data['password'] =md5($register_data['password']);
	
	$fields='`'.implode('`,`',array_keys($register_data)).'`';
	$data = '\''. implode('\', \'', $register_data).'\'';
	

	mysqli_query($link,"INSERT INTO `users` ($fields) VALUES ($data)");
	
}
function user_count()
{
	global $link;
$usercount = mysqli_result(mysqli_query($link,"SELECT COUNT(`user_id`) FROM `users` WHERE `active`=1"),0);
$usercount=(int)$usercount;
if($usercount <=1)
{
	echo $usercount." "."user";
}
else
{
	echo $usercount." "."users"; 
}
}
function user_data($user_id)
{
	global $link;
	$data =array();
	$user_id =(int)$user_id;
	$func_num_args=func_num_args();
	$func_get_args=func_get_args();
	if ($func_get_args>1)
	{	
		unset($func_get_args[0]);
		$fields ='`'.implode('`, `',$func_get_args).'`';
		$select="SELECT $fields FROM `users` WHERE `user_id` = $user_id";
		$query= mysqli_query($link,$select);
		$data =mysqli_fetch_assoc($query);
		return $data;
	}
	
}
function logged_in()
{
return (isset($_SESSION['user_id'])) ? true : false;
}

function user_exists($username)
{
	global $link;
	$username = sanitize($username);
	$query = mysqli_query ($link,"SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username'");
	$check =mysqli_num_rows($query);
	return (mysqli_result($query,0)==1) ? true :false;
	
}
function email_exists($email)
{
	global $link;
	$email = sanitize($email);
	$query = mysqli_query ($link,"SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email'");
	$check =mysqli_num_rows($query);
	return (mysqli_result($query,0)==1) ? true :false;
	
}

function user_active($username)
{
	global $link;
	$username = sanitize($username);
	$query = mysqli_query ($link,"SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` =1");
	$check =mysqli_num_rows($query);
	return (mysqli_result($query,0)==1) ? true :false;
	
}
function user_id_from_username($username)
{
	global $link;
	$queryusername = mysqli_query($link,"SELECT `user_id` FROM `users` WHERE `username` = '$username'");
	$username =sanitize($username);
	return mysqli_result($queryusername, 0, 'user_id');
}
 function login($username, $password)
 {
 	global $link;
	 $user_id =user_id_from_username($username);
	 $username = sanitize($username);
	 $password =md5($password);
	 return (mysqli_result(mysqli_query($link,"SELECT COUNT(`user_id`) FROM `users` WHERE `username` ='$username' AND `password` ='$password'"), 0) == 1) ? $user_id : false;
 }
?>