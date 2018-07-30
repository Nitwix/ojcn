<?php

require_once "../../sensible/db_connect.php";

$result = $myDB->query("SELECT * FROM newsletter where verified=1");
$rows = $result->fetch_all();

//définis les paramètres du mail
$date = date("d").".".date("m").".".date("Y");
$subject = "Newsletter du $date";
$quill_html = $_POST["quill_html"];

$headers = "From: Newsletter de l'OJCN <newsletter@ojcn.ch>\r\n";
$headers .= "Return-Path: ojcn.officiel@gmail.com\r\n"; //si erreur dans l'envoi du mail
$headers .= "Content-Type: text/html\r\n"; //indique que le mail est au format html

$ID = 0;
$EMAIL = 1;
$TOKEN = 2;
$VERIFIED = 3;
foreach ($rows as $row) {
    //echo $row[$EMAIL]." : ".$row[$TOKEN];
    
    $email = $row[$EMAIL];
    $token = $row[$TOKEN];
    $message = $quill_html."<br><br><br>
    <a href=http://www.ojcn.ch/testing_branches/newsletter/public/newsletter.php?email=$email&token=$token&purpose=unsubscribe target=\"_blank\">
    Se désabonner de la newsletter</a>";//changer le lien de testing_branches à newsletter.php etc...

    echo $message."\n";

    if(mail($email, $subject, $message, $headers)){
        echo "La newsletter s'est correctement envoyé à $email!\n\n";
    }else{
        echo "La newsletter ne s'est pas envoyé à $email\n\n";
    }
}

?>