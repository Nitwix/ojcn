<!DOCTYPE html>
<html lang="en">
	<?php include "../includes/head.php"?>
	<body>
		<?php include "includes/navbar.php"?>
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h1>Prochaines manifestations de l'OJCN</h1>
					
					<!-- <h4>Échange avec l’Orchestre des Jeunes de Haute-Bretagne <small>(OJHB)</small> <span class='glyphicon glyphicon-exclamation-sign'></h4>
					<ul>
						<li><a href="../documents/circulaire.pdf" target="_blank">Description du projet et circulaire</a></li>
						<li><a href="../documents/description_OJHB.pdf" target="_blank">Présentation de l'OJHB</a></li>
						<li><a href="http://ojhb.fr/" target="_blank">Lien vers le site de l'OJHB</a></li>
					</ul>
					<h4>Orchestre 1 <small>(OJCN 1)</small></h4>
					<ul>
						<li>Rien de prévu pour l'instant</li>
					</ul>
					<h4>Orchestre 2 <small>(OJCN 2)</small></h4>
					<ul>
						<li>Rien de prévu pour l'instant</li>
					</ul>
					<h4>Camp d'été</h4>
					<ul>
						<li><b>« Concert de la fin du camp »</b> Samedi 11 août, 19h00, <i>Auditorium 1 - CMNE</i></li>
					</ul> -->

					<?php echo file_get_contents("../admin/contents/manifestations.html"); ?>

					<h3><a href="https://www.facebook.com/OJCN-Orchestre-des-Jeunes-du-Conservatoire-de-musique-Neuch%C3%A2telois-158607718098417" target='_blank'>
						Likez notre page Facebook pour être au courant des actualités de l'orchestre.</a></h3>
				</div>
				<div class="col-md-4">
					<h3>Abonnez-vous à la newsletter pour ne rater aucun concert!</h3>
					<p>Vous pouvez vous désabonner à tout moment via un lien contenu dans chaque mail.</p>
					<form action="newsletter.php" method="get">
						<input type="email" name="email" placeholder="email@exemple.com" class="form-control">
						<input type="submit" value="Abonnez-vous" style="margin-top: 10px; margin-bottom:20px;" class="btn btn-default pull-right">
						<input type="hidden" name="purpose" value="subscribe">
					</form>
				</div>
			</div>


			<div class="row">
				<div class="col-md-8">
					<figure>
						<img src="../images/orchestre_prochainesManifs.jpeg" class="img-responsive img-rounded">
						<figcaption class="text-center">L'orchestre 2 au spectacle des 100 ans du conservatoire</figcaption>
					</figure>
				</div>
				<div class="col-md-4"></div>
			</div>

		</div>
		<?php include "../includes/footer.php"?>

	</body>
</html>
