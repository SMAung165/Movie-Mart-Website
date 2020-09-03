<?php
if (empty($_POST) === false)
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	if (empty($username) === true || empty($password) ===true)
	{
		$errors[]= 'You need to enter a username and password';
	}
	else if(user_exists($username) === false) 
		{
			$errors[]= 'Username does not exit';
		}
	else if(user_active($username) ===false)
	{
			$errors[]= 'You haven\'t activated your account!';
	}
	else
	{
		if(strlen($password) > 32)
		{
			$errors[] ='Password is too long';
		}
		
		$login =login($username,$password);
		if($login === false)
		{
			$errors[] ='Password is incorrect';
		}
		
		else 
		{
			
			$_SESSION['user_id'] = $login;
			header ('location:index.php');
			exit();
		}
	}
}

?>