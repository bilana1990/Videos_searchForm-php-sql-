<?php
$host="localhost";
$user="gio bilana";
$password="password";
$dbname="videosearch";

// create connection
$con=mysqli_connect($host,$user,$password,$dbname);

// check connection
if (!$con) {
	die("Connection failed:" .mysqli_connect_error());
}





?>

