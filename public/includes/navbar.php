<?php
$navbar = "<nav class='navbar navbar-default navbar-fixed-top'>
<div class='container-fluid'>
<div class='navbar-header'>
<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
<span class='icon-bar'></span>
<span class='icon-bar'></span>
<span class='icon-bar'></span>                        
</button>
<a class='navbar-brand' href='http://ojcn.ch'>OJCN</a>
</div>
<div class='collapse navbar-collapse' id='myNavbar'>
";


$file_name = basename($_SERVER['PHP_SELF']);
$active_page = ['home.php' => '',
'manifestations.php' => '',
'medias.php' => '',
'contact.php' => '',
'orch1' => '',
'orch2' => '',
];

//only on page connexion.php
if(isset($orchestre)){
	if($orchestre == 1){
		$active_page['orch1'] = 'active';
	}elseif($orchestre == 2){
		$active_page['orch2'] = 'active';
	}
}

$active_page[$file_name] = 'active';

$navbar .= "<ul class='nav navbar-nav'>";
$navbar .= "<li class='".$active_page['home.php']."'><a href='home.php'>Accueil</a></li>";
$navbar .= "<li class='".$active_page['manifestations.php']."'><a href='manifestations.php'>Prochaines manifestations</a></li>";
$navbar .= "<li class='".$active_page['medias.php']."'><a href='medias.php'>Photos et vidéos</a></li>";
$navbar .= "<li class='".$active_page['contact.php']."'><a href='contact.php'>Contact</a></li>";
$navbar .= "<li><a href='http://www.cmne.ch/enseignement/inscription-ojcn/' target='_blank'>Inscriptions</a></li>";
$navbar .= "<li><a href='http://www.cmne.ch' target='_blank'>CMNE</a></li>";
$navbar .= "</ul>";
$navbar .= "<ul class='nav navbar-nav navbar-right'>";
$navbar .= "<li class=''".$active_page['orch1']."''><a href='connexion.php?orchestre=1'><span class='glyphicon glyphicon-lock'></span> OJCN 1</a></li>";
$navbar .= "<li class=''".$active_page['orch2']."''><a href='connexion.php?orchestre=2'><span class='glyphicon glyphicon-lock'></span> OJCN 2</a></li>";
$navbar .= "</ul>";
$navbar .= "</div></div></nav>";

echo $navbar;

?>
