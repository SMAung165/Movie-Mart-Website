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
?>