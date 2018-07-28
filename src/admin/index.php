<?php
	//si la page n'est pas précisée, renvoyer à manifestations
	if(!isset($_GET["page"])){
		header("Location: index.php?page=manifestations");
	}
?>

<!DOCTYPE html>
<html lang="en">
	<?php include "../includes/head.php"?>
	<body>
		<?php include "includes/navbar.php"?>

		<!-- Include stylesheet -->
		<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

		<!-- Create the editor container -->
		
		
		<div class="container">
			<div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<div id="editor">
					<?php 
						//charge les données précédemment sauvegardées
						echo file_get_contents("contents/$page.html"); 
					?>
				</div>

				<?php
					if($page != "newsletter"){
						echo "<button onclick=\"saveHTML('$page')\" type='button' class='btn btn-default' style='margin-top:15px'>Sauvegarder les modifications</button>";
					}else{
						echo "<button onclick=\"sendNewsletter()\" type='button' class='btn btn-default' style='margin-top:15px'>Envoyer la newsletter</button>";
					}
				?>
				

			</div>
		</div>
		

		
		

		<!-- Include the Quill library -->
		<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

		<!-- Initialize Quill editor -->
		<script src="quill_script.js"></script>
		
	</body>
</html>
