<?php
require_once '../init.php';
if (empty($_POST)=== false)
{
	$required_fields =array('username','password','confirm_password','email');
	foreach ($_POST as $key=>$value)
	{
		if(empty($value) && in_array($key, $required_fields) === true)
		{
			$errors[]='Some required fields are empty';
			break 1;
		}
	}
	
	if(empty($errors)=== true)
	{
		if(user_exists($_POST['username'])=== true)
		{
			$errors[]='Sorry, the user name \''.htmlentities($_POST['username']).'\' is already in use.';
		}
		if(preg_match("/\\s/", $_POST['username']) == true)
		{
			$errors[] ="Your username must not contain spaces.";
		}
		if(strlen($_POST['password']) < 8)
		{
			$errors[]='Your password needs to be at least 8 characters.';
		}
		if($_POST['password'] !== $_POST['confirm_password'])
		{
			$errors[]='Password do not match.';
		}
		if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)===false)
		{
			$errors[]= "A valid email address is required";
		}
		if(email_exists($_POST['email']) ===true)
		{
				$errors[]='Sorry, the email \''.htmlentities($_POST['email']).'\' is already in use.';
		}
	}
}
?>
<?php
if (isset($_GET['success']) && empty ($_GET['success']))
{
	echo 'You have been registered successfully';
}
else
{
	if(empty($_POST)=== false && empty($errors) === true)
	{
		$register_data =array
		(
			'username'		=> $_POST['username'],
			'password' 		=> $_POST['password'],
			'first_name' 	=> $_POST['first_name'],
			'last_name' 	=> $_POST['last_name'],
			'email' 		=> $_POST['email'],
		);
		register_user($register_data);
		header('Location: register.php?success');
		exit();
	}
	else if(empty($errors)===false)
	{
		echo output_errors($errors);
	}
}

?>