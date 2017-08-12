<!DOCTYPE html>
<html lang="en">
	<?php include "../includes/head.php"?>
	<body>

		<?php include "includes/navbar.php"?>

		<div class="container text-center">    
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#photos">Photos</a></li>
				<li><a data-toggle="tab" href="#videos">Vidéos</a></li>
			</ul>

			<div class="tab-content">

				<!-- PHOTOS-TAB -->
				<div id="photos" class="tab-pane fade in active">
					<h3>Photos</h3>
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
						<!-- Indicators -->
						<ol class="carousel-indicators" id="carouselIndicators">
							<!-- added via a script -->
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner" role="listbox" id="carouselInner">
							<!-- added via a script -->

						</div>

						<!-- Left and right controls -->
						<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>

				</div>


				<!-- VIDEOS-TAB -->
				<div id="videos" class="tab-pane fade">
					<div class="row">
						<h3>Vidéos</h3>

						<h3 class="video-title">Allocution du 1er août de Didier Burkhalter, président de la Confédération</h3>
						<div class="video-container">         
							<span style="text-align: center;"><iframe src="https://www.youtube.com/embed/0efk8ssRWGU" frameborder="0" allowfullscreen></iframe></span>
						</div>

						<h3 class="video-title">Enregistrement de l'orchestre pour un travail de maturité</h3>
						<div class="video-container">         
							<span style="text-align: center;"><iframe src="https://www.youtube.com/embed/Ao9DfjqSFb8" frameborder="0" allowfullscreen></iframe></span>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php include "../includes/footer.php"?>

		<script> //THIS SCRIPT PUTS THE IMAGES IN THE IMAGE SLIDER (CAROUSEL)
			var imgsMeta = [makeMeta("Fête des vendanges, 27.09.2015"),
							makeMeta("Kiosque à musique, 28.03.2015"),
							makeMeta("Concert au temple du bas"),
						    makeMeta("West Side Story - Violons"),
						    makeMeta("West Side Story - Vents"),
						    makeMeta("West Side Story - Cordes"),
						    makeMeta("West Side Story - Harmonie"),
						    makeMeta("West Side Story - Orchestre")]; //data of the pictures
			function makeMeta(title){
				var meta = {};
				meta.name = "";
				meta.title = title;
				return meta;
			}
			var _images = [];
			<?php $path = "../images/photos_public";
	$images = array_diff(scandir($path), array('.', '..'));
	foreach($images as $i){
		echo "_images.push('../images/photos_public/$i');";
	}
			?>;
			for (var i in _images){
				if(imgsMeta[i] == undefined){
					imgsMeta.push({name:"",title:""});
				}
				imgsMeta[i].name = _images[i];
			}

			$(document).ready(function(){
				var $carIndic = $("#carouselIndicators");
				var $carInner = $("#carouselInner");
				for(i in imgsMeta){
					if(i==0){
						$carIndic.append($("<li data-target='#myCarousel' data-slide-to='0' class='active'></li>"));

						var $item = $("<div class='item active carouselSizing'></div>");
					}else{
						$carIndic.append($("<li data-target='#myCarousel' data-slide-to='"+i+"'></li>"));

						var $item = $("<div class='item carouselSizing'></div>");
					}
					var $img = $("<img class='carouselSizing' src='../images/"+imgsMeta[i].name+"'>");

					var $caption = $("<b><div class='carousel-caption'></div></b>");//<b> to put the description out of the img
					var $title = $("<h3>"+imgsMeta[i].title+"</h3>");

					$caption.append($title);

					$item.append($img);
					$item.append($caption);

					$carInner.append($item);
				}
			});

		</script>

	</body>
</html>
