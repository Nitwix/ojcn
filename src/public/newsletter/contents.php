<?php

class Contents{
	public $title;
	public $subtitle;
	public $email;


	function __construct($purpose, $email){
		$this->email = $email;
		$this->invalid_email = false;

		switch($purpose){
			case "verify_msg":
				$this->title = "Veuillez confirmer votre email.";
				$this->subtitle = "Un e-mail de confirmation vous a été envoyé à l'adresse suivante: $this->email";
				break;
			case "verified":
				$this->title = "Votre e-mail a bien été vérifié";
				$this->subtitle = "Vous recevrez désormais la newsletter de l'OJCN!";
				break;
			case "invalid_email":
				$this->title = "L'adresse que vous avez entré n'est pas valide.";
				$this->subtitle = "Est-ce que \"$this->email\" est correct?";

				$this->invalid_email = true;
				break;
			default:
				echo "<div class='container' style='font-size:50px'>Error: Purpose not found...</div>";
		}
	}

	public function display(){
		$out = "";
		$out .= "<h1>$this->title</h1>";
		$out .= "<h3>$this->subtitle<h3>";
		echo $out;
	}
}

?>