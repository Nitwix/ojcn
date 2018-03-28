<?php require 'includes/is_connected.php'; ?>

<!DOCTYPE html>
<html lang="en">
	<?php include "../includes/head.php"?>
	<body>
		<?php include "includes/navbar.php"?>

		<div class="container text-center">    
			<div class="row">
				<div class="col-lg-2"></div>
				<div class="col-sm-12 col-lg-8 text-justify"> 
					<h1 class="text-center">Partie privée de l'orchestre <?php echo $get_orchestre?></h1>
					<h3>Bienvenue sur la partie privée de l'orchestre <?php echo $get_orchestre?></h3>
					
					<p>Vous trouverez ici plusieurs choses utiles concernant l'orchestre (agenda, partitions, audios de travail,...).
					<br>Cette partie du site est accessible uniquement via un mot de passe identique pour tous les membres de l'orchestre.
						En utilisant ce site, vous vous engagez à ne communiquer le mot de passe de la partie privée <b>qu'aux membres de l'orchestre</b> dont vous faites partie.
					</p>
					<p>Si vous avez une question ou une suggestion concernant le site, vous pouvez me contacter par e-mail à <a href="mailto:ojcn.officiel@gmail.com">ojcn.officiel@gmail.com</a> ou par Whatsapp (si c'est urgent) (+41 78 755 53 72).</p>
					
				</div>
				<div class="col-lg-2"></div>
			</div>
			<div class="row">
				<div class="col-sm-2 col-lg-3 col-md-2"></div>
				<div class="col-sm-8 col-lg-6 col-md-8">
					<figure>
						<img src="../images/WSS_ensemble.jpg" class="img-responsive">
						<figcaption>Orchestre 2 jouant West Side Story</figcaption>
					</figure>
				</div>
				<div class="col-sm-2 col-lg-3 col-md-2"></div>
			</div>
		</div>

		<?php include "../includes/footer.php"?>

	</body>
</html>
