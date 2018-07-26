<?php
//DEBUGGING FUNCTION
function console_log($message){
    echo "<script>";
    echo "console.log(\"$message\")";
    echo "</script>";
}

$purpose = htmlspecialchars($_POST["purpose"]); //GET pour débugger
$email = htmlspecialchars($_POST["email"]);
$invalid_email = false; //booleen 'true' si l'email est invalid

//vérifie que l'email est donné dans un format correct
if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $purpose = "invalid_email";
    $invalid_email = true;
}

//contenus de la page
require "newsletter/contents.php";
$contents = new Contents($purpose, $email);

if(!$invalid_email){
    require "../sensible/db_connect.php";
    
    //regarder dans la db pour voir si l'email n'existe pas déjà
    $query = "SELECT * FROM newsletter WHERE email='$email';"; 
    $result = $myDB->query($query);
    $db_email = $result->fetch_assoc()["email"];
    
    //si le mail existe dans la bdd, signaler cela
    //sinon: ajouter le mail dans la bdd et envoyer un mail pour confirmer
    if($db_email != null){
        $contents->title = "Cet email est déjà abonné à la newsletter";
        $contents->subtitle = "Utilisez le lien présent dans un mail pour vous désabonner.";
    }else{
        $token = bin2hex(random_bytes(16));
        console_log($token);
        
        //ajout de l'email dans la db (verified est encore à 0 = false)
        $query = "INSERT INTO newsletter (email, token) VALUES('$email', '$token');";
        $insert = $myDB->query($query);
        
        //envoyer le mail pour confirmer
        $to = "nielsnfsmw@gmail.com"; //should be $email
        $subject = "Confirmez votre abonnement à la newsletter de l'OJCN";
        $message = "
        <h1>Merci de votre intérêt pour l'OJCN!</h1><br>
        <p>Veuillez cliquer sur le lien suivant pour confirmer votre abonnement:<br>
        <a href=\"
        ";
        $headers = "From: Newsletter de l'OJCN <newsletter@ojcn.ch>\r\n";
        $headers .= "Return-Path: nielsnfsmw@gmail.com\r\n"; //si erreur dans l'envoi du mail
        $headers .= "Content-Type: text/html\r\n"; //indique que le mail est au format html
        if(mail($to, $subject, $message, $headers)){
            console_log("+ Mail de demande de confirmation envoyé.");
        }else{
            console_log("- Mail de demande de confirmation non envoyé");
        }
    }
}
?>