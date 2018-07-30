<?php
    //récupère la page modifiée
    $page = $_POST["page"];
    
    $modif_date = date("d").".".date("m").".".date("Y");

    //récupère l'html modifié dans index.php
    $html_data = $_POST["quill_html"];
    $html_data .= "<p>Dernière modification le $modif_date</p>";

    $contents_dir = __DIR__."/../contents/";
    $dir = $contents_dir."$page.html";
    //écris les données dans le fichier
    file_put_contents($dir, $html_data);
    echo realpath($dir);
?>