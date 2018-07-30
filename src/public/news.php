<!DOCTYPE html>
<html lang="en">
	<?php include "../includes/head.php"?>
	<body>
		<?php include "includes/navbar.php"?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
                    <?php echo file_get_contents("../admin/contents/news.html"); ?>
                </div>
			</div>
		</div>
		<?php include "../includes/footer.php"?>
	</body>
</html>
