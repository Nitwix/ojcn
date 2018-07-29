<?php

//envoyer le mail pour confirmer
$to = ""; //should be $email
$subject = "Confirmez votre abonnement à la newsletter de l'OJCN";
$message = "
<h1>Merci de votre intérêt pour l'OJCN!</h1><br>
<p>Veuillez cliquer sur le lien suivant pour confirmer votre abonnement:<br>
<a href=http://www.ojcn.ch/testing_branches/newsletter/public/newsletter.php?email=$email&token=$token&purpose=confirm target=\"_blank\">Confirmez!</a>
"; //changer le lien de testing_branches à newsletter.php etc...
$headers = "From: Newsletter de l'OJCN <newsletter@ojcn.ch>\r\n";
$headers .= "Return-Path: nielsnfsmw@gmail.com\r\n"; //si erreur dans l'envoi du mail
$headers .= "Content-Type: text/html\r\n"; //indique que le mail est au format html
if(mail($to, $subject, $message, $headers)){
    console_log("+ Mail de demande de confirmation envoyé.");
}else{
    console_log("- Mail de demande de confirmation non envoyé");
}

?>