<?php
$connect_error ='Sorry we are experiencing connection problems.';
$link= mysqli_connect('localhost', 'root', '') or die($connect_error);
mysqli_select_db($link,'MM') or die($connect_error);
?>