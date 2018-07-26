<!DOCTYPE html>

<html>
	<?php include "../includes/head.php"?>
	<body>
		<!-- <?php include "includes/navbar.php"?> -->

		<?php
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
	</body>
</html>

