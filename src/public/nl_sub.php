<!DOCTYPE html>
<?php
		require "../vendor/autoload.php";
		use DebugBar\StandardDebugBar;

		$debugbar = new StandardDebugBar();
		$debugbarRenderer = $debugbar->getJavascriptRenderer();

		
?>
<html lang="en">
	<?php include "../includes/head.php"?>
	
	<?php
		$debugbarRenderer->setBaseUrl('../vendor/maximebf/debugbar/src/DebugBar/Resources');
		echo $debugbarRenderer->renderHead();
	?>

	<body>
		<?php include "includes/navbar.php"?>

		<?php
			$purpose = htmlspecialchars($_POST["purpose"]) || htmlspecialchars($_GET["purpose"]);
			$email = htmlspecialchars($_POST["email"]);
			
			//contenus de la page
			require "newsletter/contents.php";
			$contents = new Contents($purpose, $email);

			require "../sensible/db_connect.php";
			
			//regarder dans la db pour voir si l'email n'existe pas déjà
			$query = "SELECT * FROM newsletter WHERE email='$email';"; 
			$result = $myDB->query($query);
			$db_email = $result->fetch_assoc()["email"];

			//si l'email n'existe pas, envoyer un mail de confirmation et ajouter à la db
			//sinon, afficher que le mail existe déjà
			if($db_email != null){
				$debugbar["messages"]->addMessage("email already exists: $db_email");
				$contents->title = "Cet email est déjà abonné à la newsletter";
				$contents->subtitle = "Utilisez le lien présent dans un mail pour vous désabonner.";
			}else{
				$debugbar["messages"]->addMessage("email doesn't exits: $db_email");

				//pour ne pas avoir deux fois le même token (bien que grandement improbable)
				$token_taken = false;
				do{
					$token = bin2hex(random_bytes(16));
					$query = "SELECT * FROM newsletter WHERE token='$token';"; 
					$result = $myDB->query($query);
					$db_token = $result->fetch_assoc()["token"];
					if($db_token == null){
						$token_taken = false;
					}
				}while($token_taken);

				//ajout de l'email dans la db (verified est encore à 0 = false)
				$query = "INSERT INTO newsletter (email, token) VALUES('$email', '$token');";
				$insert = $myDB->query($query);
				$debugbar["messages"]->addMessage($query);
			}

		?>

		<div class="container">
			<div class="row">
				<div class="col-md-2 col-lg-2"></div>
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
					<?php
						$contents->display();
						echo $first_email;
					?>
				</div>
				<div class="col-md-2 col-lg-2"></div>
			</div>
		</div>

		<?php include "../includes/footer.php"?>
		
		<?php echo $debugbarRenderer->render() ?>
	</body>
</html>

