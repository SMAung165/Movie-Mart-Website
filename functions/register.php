<?php
if (isset($_POST['btn2'])) { 
if (empty($_POST)=== false)
{
	$required_fields =array('username','password','confirm_password','email');
	foreach ($_POST as $key=>$value)
	{
		if(empty($value) && in_array($key, $required_fields) === true)
		{
			$reg_errors[]='Some required fields are empty';
			break 1;
		}
	}
	
	if(empty($reg_errors)=== true)
	{
		if(empty($_FILES['profile']['name']) === false)
		{
			$allowed =array('jpg','jpeg','gif','png');
			
			$file_name=$_FILES['profile']['name'];
			$file_extn= explode('.',$file_name);
			$file_extension=strtolower(end($file_extn));
			$file_temp=$_FILES['profile']['tmp_name'];
			if(in_array($file_extension,$allowed)===true)
			{
				//DO Nothin yet
			}
			else
			{
				$reg_errors[]= 'Only these file types are allowed: jpg, jpeg, gif, png';
			}
		}
		if(user_exists($_POST['username'])=== true)
		{
			$reg_errors[]='Sorry, the user name \''.htmlentities($_POST['username']).'\' is already in use.';
		}
		if(preg_match("/\\s/", $_POST['username']) == true)
		{
			$reg_errors[] ="Your username must not contain spaces.";
		}
		if(strlen($_POST['password']) < 8)
		{
			$reg_errors[]='Your password needs to be at least 8 characters.';
		}
		if($_POST['password'] !== $_POST['confirm_password'])
		{
			$reg_errors[]='Password do not match.';
		}
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)===false)
		{
			$reg_errors[]= "A valid email address is required";
		}
		if(email_exists($_POST['email']) ===true)
		{
				$reg_errors[]='Sorry, the email \''.htmlentities($_POST['email']).'\' is already in use.';
		}

	}
}


			if(empty($_POST)=== false && empty($reg_errors) === true)
			{
				$file_name=$_FILES['profile']['name'];
				$file_extn= explode('.',$file_name);
				$file_extension=strtolower(end($file_extn));
				$file_temp=$_FILES['profile']['tmp_name'];
				$file_path= 'images/profile/'.substr(md5(time()),0,10).'.'.$file_extension;
				$file_path_in_db= '../images/profile/'.substr(md5(time()),0,10).'.'.$file_extension;
				move_uploaded_file($file_temp, $file_path);
				$register_data =array
				(
					'username'		=> $_POST['username'],
					'password' 		=> $_POST['password'],
					'first_name' 	=> $_POST['first_name'],
					'last_name' 	=> $_POST['last_name'],
					'email' 		=> $_POST['email'],
					'profile'       => $file_path_in_db
				);
				register_user($register_data);
				$success[]= "You have been registered successfully";
			}
			else if(empty($reg_errors)===false)
			{
				output_reg_errors($reg_errors);
			}

}
?>