<?php require 'includes/is_connected.php'; ?>

<!DOCTYPE html>
<html lang="en">
	<?php include "../includes/head.php"?>
	<body>
		<?php include "includes/navbar.php"?>
		<div class="container" id="bodyContainer">
			<h1>Vous trouverez ici les liens vers les dossiers dropbox des partitions, des audios et de divers documents.</h1>
			<!-- ul added via script -->
			<?php
				class Links{
					function __construct($partitions,$audios,$ancien,$documents){
						$this->partitions = $partitions;
						$this->audios = $audios;
						$this->ancien = $ancien;
						$this->documents = $documents;
					}
					
					public function displayLinks(){
						echo "<ul>";
						echo "<li><a href='$this->partitions' target='_blank'><h3>Partitions</h3></a></li>";
						echo "<li><a href='$this->audios' target='_blank'><h3>Audios</h3></a></li>";
						echo "<li><a href='$this->ancien' target='_blank'><h3>Anciennes partitions et audios</h3></a></li>";
						echo "<li><a href='$this->documents' target='_blank'><h3>Documents divers</h3></a></li>";
						echo "</ul>";
					}
				}
				switch($get_orchestre){
					case 1:
						$partitions = "https://www.dropbox.com/sh/bmwadbbo8du7lne/AAACheaRh9GiS7I2ccdq-SkSa?dl=0";
						$audios = "https://www.dropbox.com/sh/wvb9nr2ujt1n4ws/AACMctSS65qv9yHodupPu5nqa?dl=0";
						$ancien = "https://www.dropbox.com/sh/1fzgwypg4n5lzuh/AAD2jAIKyfno3kBlzsCrly9la?dl=0";
						$documents = "https://www.dropbox.com/sh/amlr5ssklefjppj/AAC6j0_txstq17oXHhyrmtt8a?dl=0";
						break;
					case 2:
						$partitions = "https://www.dropbox.com/sh/zigvug6v6knvsv0/AACABRgoioWC86R17mfNajxYa?dl=0";
						$audios = "https://www.dropbox.com/sh/elykt0gmzl2omhj/AAD--NuKfYwXCCbJHXDpMoc1a?dl=0";
						$ancien = "https://www.dropbox.com/sh/j7ck2h0vvsf1h1y/AABqXt_V4K2cNmDPhyc6tGM6a?dl=0";
						$documents = "https://www.dropbox.com/sh/oosbuh1mvqf5ahg/AABOyoF1yBqPxE_4YLfs6vF1a?dl=0";
						break;
				}
				$theLinks = new Links($partitions,$audios,$ancien,$documents);
				$theLinks->displayLinks();
			?>
		</div>

		<?php include "../includes/footer.php"?>

	</body>
</html>
