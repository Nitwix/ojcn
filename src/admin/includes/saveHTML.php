<?php
    //récupère l'html modifié dans index.php
    $html_data = $_POST["quill_html"];
    //récupère la page modifiée
    $page = $_POST["page"];
    $dir = __DIR__."/../contents/$page.html";
    //écris les données dans le fichier
    file_put_contents($dir, $html_data);
    echo realpath($dir);
?>