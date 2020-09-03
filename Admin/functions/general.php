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
function output_errors($errors)
{
 return '<ul style="list-style-type:none"><li>'.implode('</li><li>',$errors).'</li></ul>';
}
?>