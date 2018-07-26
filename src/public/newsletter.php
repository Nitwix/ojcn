<!DOCTYPE html>

<html>
	<?php include "../includes/head.php"?>
	<body>
		<!-- <?php include "includes/navbar.php"?> -->

		<?php
			require "newsletter/contents.php";
			require "../sensible/db_connect.php";

			$contents = new Contents();

			//DEBUGGING FUNCTION
			function console_log($message){
				echo "<script>";
				echo "console.log(\"$message\")";
				echo "</script>";
			}

			$email = htmlspecialchars($_GET["email"]);
			$contents->email = $email;
			$invalid_email = false; //booleen 'true' si l'email est invalid
			
			//vérifie que l'email est donné dans un format correct
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$contents->set_invalid_email();
				$invalid_email = true;
			}

			if(!$invalid_email){
				//regarder dans la db pour voir si l'email n'existe pas déjà
				$query = "SELECT * FROM newsletter WHERE email='$email';"; 
				$result = $myDB->query($query);
				$db_line = $result->fetch_assoc();
				$db_email = $db_line["email"];
				//var_dump("db_email", $db_email);

				$purpose = htmlspecialchars($_GET["purpose"]);
				switch($purpose){
					case "subscribe":
						require "newsletter/subscribe.php";
						break;
					case "confirm":
						require "newsletter/confirm.php";
						break;
					case "unsubscribe":
						require "newsletter/unsubscribe.php";
						break;
					default:
						echo "Purpose of newsletter.php not found";
				}
			}
			
		?>

		<div class="container">
			<div class="row">
				<div class="col-md-2 col-lg-2"></div>
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
					<?php
						$contents->display();
					?>
				</div>
				<div class="col-md-2 col-lg-2"></div>
			</div>
		</div>

		<?php include "../includes/footer.php"?>
	</body>
</html>

