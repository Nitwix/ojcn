<?php
	echo "<h1>En cours de déconnexion...</h1>";
	session_start();
	session_destroy();
	
	header("Location: ../public/home.php");
?>
	