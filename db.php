<?php
$connection = mysqli_connect('localhost', 'root', '');
if(!$connection){
	die("Database Connection Failed" . mysqli_error($connection));
}
$selectdb = mysqli_select_db($connection, 'blog');
if(!$selectdb){
	die("Database Selection Failed" . mysqli_error($connection));
}
