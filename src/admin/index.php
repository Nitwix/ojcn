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
			<div class="col-md-12">
				<div class="row">
					<?php
						if($page === "newsletter"){
							require "../sensible/db_connect.php";
							$result = $myDB->query("SELECT count(*) FROM newsletter WHERE verified=1");
							$n_subscribers = $result->fetch_row()[0];
							echo "<h3>La newsletter sera envoyée aux $n_subscribers abonnés.</h3>";
						}
					?>
					<div id="editor">
						<?php 
							//charge les données précédemment sauvegardées
							echo file_get_contents("contents/$page.html"); 
						?>
					</div>

					<?php
						//Bouton sauvegarder/envoyer
						if($page != "newsletter"){
							echo "<button onclick=\"saveHTML('$page')\" type='button' class='btn btn-default' style='margin-top:15px'>Sauvegarder les modifications</button>";
						}else{
							echo "<button onclick=\"sendNewsletter()\" type='button' class='btn btn-default' style='margin-top:15px'>Envoyer la newsletter</button>";
							echo "
								<p>Pour voir si les mails se sont envoyés, veuillez ouvrir la console du navigateur. 
									<a href=https://webmasters.stackexchange.com/questions/8525/how-do-i-open-the-javascript-console-in-different-browsers target=\"_blank\">Comment faire?</a>
								</p>
							";
						}
					?>
				</div>
			</div>
		</div>
		

		
		

		<!-- Include the Quill library -->
		<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

		<!-- Initialize Quill editor -->
		<script src="quill_script.js"></script>
		
	</body>
</html>
