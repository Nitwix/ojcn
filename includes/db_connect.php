<?php
//connect to database
$servername = "localhost";
$username = "user150001_niels";
$password = "Niels2017OJCN";
$dbname = "user150001_niels";

// Create connection
$myDB = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$myDB) {
	die("Connection failed: " . mysqli_connect_error());
}
?>