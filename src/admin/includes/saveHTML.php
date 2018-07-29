<?php
    //récupère la page modifiée
    $page = $_POST["page"];
    $contents_dir = __DIR__."/../contents/";

    file_put_contents($contents_dir.$page."_modif_date.txt", date("d").".".date("m").".".date("Y"));

    //récupère l'html modifié dans index.php
    $html_data = $_POST["quill_html"];
    $dir = $contents_dir."$page.html";
    //écris les données dans le fichier
    file_put_contents($dir, $html_data);
    echo realpath($dir);
?>