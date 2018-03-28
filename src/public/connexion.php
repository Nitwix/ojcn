<?php
//starts the session
session_start();

$orchestre = $_GET['orchestre'];
?>

<!DOCTYPE html>
<html lang="en">
	<?php include "../includes/head.php"?>
	<body>
		<?php include "includes/navbar.php"?>
		<div class="container">
			<h2 class="text-center">Connexion à la partie privée de l'orchestre <?php echo $orchestre;?></h2>
			<form action='conn_script.php' method='post'>
			<div class="form-group">
				<label for="pwd">Mot de passe:</label>
				<input type="password" class="form-control" id="pwd" placeholder="Mot de passe" name="password">
			</div>
			
			<!-- to send the number of the orchestre to conn_script.php -->
			<button type="submit" class="btn btn-default" >Se connecter</button>
			<input name="orchestre" value="<?php echo $orchestre;?>" style="visibility:hidden;height:0px;width:0px;margin:0px;padding:0px;">
			</form>
		<?php

		if(!isset($_SESSION['connected'])){
			exit;
		}
		if($_SESSION['connected'] && $_SESSION['orchestre'] == $orchestre){
			echo "<div class='alert alert-success' style='margin-top:15px;'>
    					<strong>Re-bonjour!</strong> Vous êtes déjà connecté. Accédez à la partie privée en cliquant <a href='../private/home.php?orchestre=$orchestre'>ici!</a>
  						</div>";
		}
		if(!$_SESSION['connected'] && $_SESSION['orchestre'] == $orchestre){
			echo "<div class='alert alert-danger' style='margin-top:15px;'>
							<strong>Erreur!</strong> Le mot de passe que vous avez entré est erroné.
						</div>";
		}

		?>

		</div>

	<?php include '../includes/footer.php' ?>
	</body>
</html>