<?php
require_once '../init.php';
if (empty($_POST)=== false)
{
	$required_fields =array('current_password','password','confirm_password');
	
	foreach ($_POST as $key=>$value)
	{
		if(empty($value) && in_array($key, $required_fields) === true)
		{
			$errors[]='Some required fields are empty';
			break 1;
		}
	}
if(md5($_POST['current_password']) ===  $user_data['password'])
	{
		if(trim($_POST['password']) !== trim($_POST['confirm_password']))
		{
			$errors[]='New password do not match';
		}
		else if(strlen($_POST['password']) < 8)
		{
			$errors[]='Your password needs to be at least 8 characters.';
		}
		else if(trim($_POST['current_password']) === (trim($_POST['password'])))
		{
			$errors[]='New password must not be the same as the old one';
		}
	}
	else
	{
		$errors[]='Current password do not match';
	}
	
}
?>
<?php
if (isset($_GET['success']) && empty ($_GET['success']))
{
	echo 'Your password has been changed successfully';
}
	else
	{
		if(empty($_POST)=== false && empty($errors) === true)
		{
			change_password($session_user_id, $_POST['password']);
			header('Location:changepassword.php?success');
		}
		else if(empty($errors)===false)
		{
			echo output_errors($errors);
		}
	}
?>