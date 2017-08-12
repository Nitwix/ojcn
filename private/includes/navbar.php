<?php
$navbar =  "<nav class='navbar navbar-default navbar-fixed-top'>
			<div class='container-fluid'>
				<div class='navbar-header'>
					<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>                        
					</button>
					<a class='navbar-brand' href='http://ojcn.ch'>OJCN $get_orchestre</a>
				</div>
				<div class='collapse navbar-collapse' id='myNavbar'>"; //in the future, change http://new.ojcn.ch to http://ojcn.ch


$file_name = basename($_SERVER['PHP_SELF']);

$active_page = ['home.php' => '',
				'agenda.php' => '',
				'fichiers.php' => '',
			   ];
//$get_orchestre defined in is_connected.php
$active_page[$file_name] = 'active';

$navbar .= "<ul class='nav navbar-nav'>
				<li class='".$active_page['home.php']."'><a href='home.php?orchestre=$get_orchestre'><span class='glyphicon glyphicon-home'></span> Accueil</a></li>
				<li class='".$active_page['agenda.php']."'><a href='agenda.php?orchestre=$get_orchestre'><span class='glyphicon glyphicon-calendar'></span> Agenda</a></li>
				<li class='".$active_page['fichiers.php']."'><a href='fichiers.php?orchestre=$get_orchestre'><span class='glyphicon glyphicon-file'></span> Fichiers</a></li>
			</ul>";

$navbar .= "<ul class='nav navbar-nav navbar-right'>
					<li><a href='../includes/disconnect.php'><span class='glyphicon glyphicon-log-out'></span> Se déconnecter</a></li>
					<li><a href='../public/home.php'><span class='glyphicon glyphicon-home'></span> Partie publique</a></li>
				</ul>";

$navbar .=	"</div></div></nav>";

echo $navbar;
?>
