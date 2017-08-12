<?php
$aux1 =  "<nav class='navbar navbar-default navbar-fixed-top'>
			<div class='container-fluid'>
				<div class='navbar-header'>
					<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>
						<span class='icon-bar'></span>                        
					</button>
					<a class='navbar-brand' href='http://ojcn.ch'>OJCN $get_orchestre</a>
				</div>
				<div class='collapse navbar-collapse' id='myNavbar'>
					<ul class='nav navbar-nav'>"; //in the future, change http://new.ojcn.ch to http://ojcn.ch


$file_name = basename($_SERVER['PHP_SELF']);
//$get_orchestre defined in is_connected.php
switch($file_name){		
	case "agenda.php":
		$li = "<li><a href='home.php?orchestre=$get_orchestre'><span class='glyphicon glyphicon-home'></span> Accueil</a></li>
				<li class='active'><a href='agenda.php?orchestre=$get_orchestre'><span class='glyphicon glyphicon-calendar'></span> Agenda</a></li>
				<li><a href='fichiers.php?orchestre=$get_orchestre'><span class='glyphicon glyphicon-file'></span> Fichiers</a></li></ul>";
		break;
	case "fichiers.php":
		$li = "<li><a href='home.php?orchestre=$get_orchestre'><span class='glyphicon glyphicon-home'></span> Accueil</a></li>
				<li><a href='agenda.php?orchestre=$get_orchestre'><span class='glyphicon glyphicon-calendar'></span> Agenda</a></li>
				<li class='active'><a href='fichiers.php?orchestre=$get_orchestre'><span class='glyphicon glyphicon-file'></span> Fichiers</a></li></ul>";
		break;
	default: //which is for HOME.PHP
		$li = "<li class='active'><a href='home.php?orchestre=$get_orchestre'><span class='glyphicon glyphicon-home'></span> Accueil</a></li>
				<li><a href='agenda.php?orchestre=$get_orchestre'><span class='glyphicon glyphicon-calendar'></span> Agenda</a></li>
				<li><a href='fichiers.php?orchestre=$get_orchestre'><span class='glyphicon glyphicon-file'></span> Fichiers</a></li></ul>";
		break;
}

$li = $li."<ul class='nav navbar-nav navbar-right'>
					<li><a href='../includes/disconnect.php'><span class='glyphicon glyphicon-log-out'></span> Se déconnecter</a></li>
					<li><a href='../public/home.php'><span class='glyphicon glyphicon-home'></span> Partie publique</a></li>
				</ul>";

$aux2 =	"</div></div></nav>";

echo "$aux1 $li $aux2";
?>
