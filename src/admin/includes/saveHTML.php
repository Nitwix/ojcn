<?php
    //récupère la page modifiée
    $page = $_POST["page"];
    $contents_dir = __DIR__."/../contents/";
    
    $modif_date = date("d").".".date("m").".".date("Y");
    $date_path = $contents_dir.$page."_modif_date.txt";
    echo var_dump(file_put_contents($date_path, $modif_date));
    echo "File written: ".realpath($date_path)."\n\n";

    //récupère l'html modifié dans index.php
    $html_data = $_POST["quill_html"];
    echo $html_data;
    
    $html_path = $contents_dir."$page.html";
    //écris les données dans le fichier
    echo var_dump(file_put_contents($html_path, $html_data));
    echo "File written: ".realpath($html_path)."\n\n";
?>