<?php
$navbar = "
	<nav class='navbar navbar-default'></nav>
	<nav class='navbar navbar-default navbar-fixed-top'>
	<div class='container-fluid'>
		<div class='navbar-header'>
			<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#myNavbar'>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>
				<span class='icon-bar'></span>                        
			</button>
			<a class='navbar-brand' href='http://ojcn.ch'>OJCN - admin</a>
		</div>
		<div class='collapse navbar-collapse' id='myNavbar'>"; 


$page = htmlspecialchars($_GET["page"]);

$active_page = ['manifestations' => '',
				'news' => '',
				'newsletter' => '',
			   ];
$active_page[$page] = 'active';

$navbar .= "<ul class='nav navbar-nav'>
                <li class='".$active_page['manifestations']."'><a href='index.php?page=manifestations'>Manifestations</a></li>
                <li class='".$active_page['news']."'><a href='index.php?page=news'>News</a></li>
                <li class='".$active_page['newsletter']."'><a href='index.php?page=newsletter'>Newsletter</a></li>
			</ul>";

$navbar .=	"</div></div></nav>";

echo $navbar;
?>
