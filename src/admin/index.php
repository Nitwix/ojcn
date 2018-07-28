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
		
		<div id="editor"></div>
		

		<!-- Include the Quill library -->
		<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

		<!-- Initialize Quill editor -->
		<script src="quill_script.js"></script>
		
	</body>
</html>
