<?php
session_start();

$get_orchestre = htmlspecialchars($_GET['orchestre']);

$session_orchestre = (isset($_SESSION['orchestre'])) ? $_SESSION['orchestre'] : NULL;

$session_connected = (isset($_SESSION['connected'])) ? $_SESSION['connected'] : NULL;

//TEMPORARY !!!
//$get_orchestre = 2; $session_orchestre = 2; $session_connected = true;

if($get_orchestre != $session_orchestre || !$session_connected){
	header("Location: ../public/connexion.php?orchestre=$get_orchestre");
}

?>