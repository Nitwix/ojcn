<?php
//start the session
session_start();

require '../sensible/db_connect.php';

$user_pwd = htmlspecialchars($_POST['password']);
$orchestre = htmlspecialchars($_POST['orchestre']);

$request = "SELECT encr_password FROM Passwords WHERE orchestre=".$orchestre." ORDER BY id DESC LIMIT 1;";
$result = mysqli_query($myDB, $request);
$array = mysqli_fetch_assoc($result); 
$stored_pwd = $array['encr_password']; 

$_SESSION['orchestre'] = $orchestre;

if(password_verify($user_pwd,$stored_pwd)){
	$_SESSION['connected'] = true;
	header("Location: ../private/home.php?orchestre=$orchestre");
}else{
	$_SESSION['connected'] = false;
	header("Location: connexion.php?orchestre=$orchestre");
}

?>