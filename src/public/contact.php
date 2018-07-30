<!DOCTYPE html>
<html lang="en">
	<?php include "../includes/head.php"?>
	<body>

		<?php include "includes/navbar.php"?>

		<div class="container text-center">    
			<!-- <h1>Une question? Une requête?</h1>
			<h3>Contactez-nous simplement à <a href="mailto:ojcn.officiel@gmail.com">ojcn.officiel@gmail.com</a></h3> -->
			<?php 
				echo file_get_contents("../admin/contents/contact.html");
			?>
		</div>

		<?php include "../includes/footer.php"?>

	</body>
</html>
