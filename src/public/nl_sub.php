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
			//DEBUGGING FUNCTION
			function console_log($message){
				echo "<script>";
				echo "console.log(\"$message\")";
				echo "</script>";
			}


			$purpose = htmlspecialchars($_POST["purpose"]) /* || htmlspecialchars($_GET["purpose"]) */; //GET pour débugger
			$email = htmlspecialchars($_POST["email"]) /* || htmlspecialchars($_GET["email"]) */;
			$invalid_email = false; //booleen 'true' si l'email est invalid

			//vérifie que l'email est donné dans un format correct
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$purpose = "invalid_email";
				$invalid_email = true;
			}
			
			//contenus de la page
			require "newsletter/contents.php";
			$contents = new Contents($purpose, $email);

			if(!$invalid_email){
				require "../sensible/db_connect.php";
			
				//regarder dans la db pour voir si l'email n'existe pas déjà
				$query = "SELECT * FROM newsletter WHERE email='$email';"; 
				$result = $myDB->query($query);
				$db_email = $result->fetch_assoc()["email"];

				//si le mail existe dans la bdd, signaler cela
				//sinon: ajouter le mail dans la bdd et envoyer un mail pour confirmer
				if($db_email != null){
					$debugbar["messages"]->addMessage("email already exists: $db_email");
					$contents->title = "Cet email est déjà abonné à la newsletter";
					$contents->subtitle = "Utilisez le lien présent dans un mail pour vous désabonner.";
				}else{
					$debugbar["messages"]->addMessage("email doesn't exits: $db_email");

					$token = bin2hex(random_bytes(16));
					console_log($token);

					//ajout de l'email dans la db (verified est encore à 0 = false)
					$query = "INSERT INTO newsletter (email, token) VALUES('$email', '$token');";
					$insert = $myDB->query($query);
					$debugbar["messages"]->addMessage($query);

					//envoyer le mail pour confirmer
					$to = "nielsnfsmw@gmail.com"; //should be $email
					$subject = "test de la newsletter ojcn.ch";
					$message = "Ceci est un message";
					$headers = "From: newsletter@ojcn.ch" . "\r\n";
					if(mail($to, $subject, $message, $headers)){
						console_log("Message succesfully sent");
					}else{
						console_log("Message not sent");
					}
					//RESTART TO WORK HERE!!!
					
				}
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

