<?php

class Contents{
	public $title;
	public $subtitle;
	public $email;


	function __construct($purpose, $email){
		$this->title = "Default title";
		$this->subtitle = "Default subtitle";
		$this->email = "default@default.default";
	}

	public function set_invalid_email(){
		$this->title = "L'adresse que vous avez entré n'est pas valide.";
		$this->subtitle = "Est-ce que \"$this->email\" est correct?";
	}

	public function set_already_subscribed(){
		$this->title = "Cet email ($this->email) est déjà abonné à la newsletter";
    	$this->subtitle = "Utilisez le lien présent dans un mail pour vous désabonner.";
	}

	public function set_please_verify(){
		$this->title = "Veuillez confirmer votre email.";
		$this->subtitle = "Un e-mail de confirmation vous a été envoyé à l'adresse suivante: $this->email";
	}

	public function display(){
		$out = "";
		$out .= "<h1>$this->title</h1>";
		$out .= "<h3>$this->subtitle<h3>";
		echo $out;
	}
}

?>