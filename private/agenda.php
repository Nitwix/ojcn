<?php require 'includes/is_connected.php'; ?>

<!DOCTYPE html>
<html lang="en">
	<?php include "../includes/head.php"?>
	<body>
		<?php include "includes/navbar.php"?>

		<div class="container text-center">    
			<div class="row">
				<div class="col-lg-2 col-md-1"></div>
				<div class="col-sm-12 col-lg-8 col-md-10 text-justify"> 
					<h1 class="text-center">Agenda de l'orchestre <?php echo $get_orchestre?></h1>
					<h4 class="text-center">Vous trouverez ici les dates des prochains rendez-vous de l'orchestre <?php echo $get_orchestre?></h4>
					<div class='responsive-iframe-container'>
						<?php
							$agenda1 = "<iframe src='https://calendar.google.com/calendar/embed?height=600&amp;wkst=2&amp;hl=fr&amp;bgcolor=%23ff9900&amp;src=q6tlmqdsov2oq034e5upq9bkl8%40group.calendar.google.com&amp;color=%23125A12&amp;ctz=Europe%2FZurich' style='border-width:0' width='800' height='600' frameborder='0' scrolling='no'></iframe>";
	
							$agenda2 = "<iframe src='https://calendar.google.com/calendar/embed?height=600&amp;wkst=2&amp;hl=fr&amp;bgcolor=%23ff9900&amp;src=l4s72nghvu58fetuio7ei3v5so%40group.calendar.google.com&amp;color=%23125A12&amp;ctz=Europe%2FZurich' style='border-width:0' width='800' height='600' frameborder='0' scrolling='no'></iframe>";
	
							switch($get_orchestre){
								case 1:
									echo $agenda1;
									break;
								case 2:
									echo $agenda2;
									break;
							}

						?>
					</div>
				</div>
				<div class="col-lg-2 col-md-1"></div>
			</div>

		</div>

		<?php include "../includes/footer.php"?>

	</body>
</html>
