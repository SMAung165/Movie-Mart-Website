<?php 
function array_sanitize(&$item)
{
	global $link;
	$item =mysqli_real_escape_string($link ,$item);
}
function sanitize($data)
{
	global $link;
	return mysqli_real_escape_string($link ,$data);
}
function output_usernameerrors($usernameerror)
{
 return '<br>'.'<p style="color:red;font-size:10px;text-align:center;">'.implode('<br>',$usernameerror).'</p>';
}
function output_passworderrors($passworderror)
{
 return '<br>'.'<p style="color:red;font-size:10px;text-align:center;">'.implode($passworderror,'<br>').'</p>';
}
function output_errors($errors)
{
 return '<br>'.'<p style="margin:0;color:red;text-align:center;">'.implode('<br>',$errors).'</p>';
}
function output_reg_errors($reg_errors)
{
 return '<br>'.'<p style="margin:0;color:red;text-align:center;">'.implode('<br>',$reg_errors).'</p>';
}
function output_success($success)
{
 return '<br>'.'<p style="margin:0;color:red;text-align:center;">'.implode('<br>',$success).'</p>';
}
?>