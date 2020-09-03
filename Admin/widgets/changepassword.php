<?php include'../functions/changepassword.php'?>

<h1>Change Password</h1>
<button onclick='window.location.href="../index.php"'>Dashboard</button>
<form action="" method="post">
	<ul>
		<li>
			Current Password*:<br>
			<input type="password" name="current_password">
		</li>
		<li>
			New Password*:<br>
			<input type="password" name="password">
		</li>
		<li>
			Confirm new password*:<br>
			<input type="password" name="confirm_password">
		</li>
	
	<br>
		<li>
			<input type="submit" value="submit">
		</li>			
	</ul>
</form>