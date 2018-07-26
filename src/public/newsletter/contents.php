<?php

class Contents{
	public $title;
	public $subtitle;
	public $email;


	function __construct(){
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

	public function set_email_not_in_db(){
		$this->title = "Email introuvable.";
		$this->subtitle = "Peut-être êtes-vous déjà désinscrit?.";
	}

	public function set_subscribed(){
		$this->title = "Abonnement réussi avec succès.";
		$this->subtitle = "Vous recevrez désormais la newsletter de l'OJCN";
	}

	public function set_query_error(){
		$this->title = "Erreur de requête";
		$this->subtitle = "Il y a eu une erreur lors de la requête à la base de données. Veuillez réessayer. Si l'erreur persiste, contactez nielsnfsmw@gmail.com";
	}

	public function set_token_mismatch(){
		$this->title = "Le jeton fourni ne correspond pas à votre email.";
		$this->subtitle = "Veuillez réessayer ce que vous avez fait.";
	}

	public function set_unsubscribed(){
		$this->title = "Désabonnement réussi avec succès.";
		$this->subtitle = "Vous ne recevrez plus de mail de la newsletter de l'OJCN";
	}

	public function display(){
		$out = "";
		$out .= "<h1>$this->title</h1>";
		$out .= "<h3>$this->subtitle<h3>";
		echo $out;
	}
}

?>