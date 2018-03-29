<!DOCTYPE html>
<?php
		require "../vendor/autoload.php";
		use DebugBar\StandardDebugBar;

		$debugbar = new StandardDebugBar();
		$debugbarRenderer = $debugbar->getJavascriptRenderer();

		$debugbar["messages"]->addMessage("hello world!");
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
			$purpose = htmlspecialchars($_POST["purpose"]);
			$email = htmlspecialchars($_POST["email"]);
			
			require "../sensible/db_connect.php";
			
			$db_emails = mysqli_query($myDB, "SELECT email FROM newsletter WHERE id=1");
			$arr = mysqli_fetch_array($db_emails);
			$first_email = $arr["email"];

			$debugbar["messages"]->addMessage($db_emails);
			//se connecter à la db pour voir si l'email n'existe pas déjà

			//si l'email n'existe pas, envoyer un mail de confirmation et ajouter à la db
			//sinon, afficher que le mail existe déjà

			class Contents{
				public $title;
				public $subtitle;
				public $email;


				function __construct($purpose, $email){
					$this->email = $email;
					switch($purpose){
						case "verify_msg":
							$this->title = "Veuillez confirmer votre email.";
							$this->subtitle = "Un e-mail de confirmation vous a été envoyé à l'adresse suivante: $this->email";
							break;
						default:
							echo "<div class='container' style='font-size:50px'>Error: Purpose not found...</div>";
					}
				}

				public function display(){
					$out = "";
					$out .= "<h1>$this->title</h1>";
					$out .= "<h3>$this->subtitle<h3>";
					echo $out;
				}
			}

			//contenus de la page
			$contents = new Contents($purpose, $email);
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

