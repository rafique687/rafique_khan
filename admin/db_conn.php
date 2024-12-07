<?php  

$host = "localhost";
$user = "root";
$pass = "";

$db_name = "task";

$conn = mysqli_connect($host, $user, $pass, $db_name);

if (!$conn) {
	echo "Connection Failed!";
	exit();
}