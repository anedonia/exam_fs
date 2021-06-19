<?php
if (empty($_SESSION['id_user'])){
    header('Location: routeur.php');
    exit();
}
require('modules/module_main_page.php');
require('./model/main_page.php');
// $page_css = "\"./public/style_shop.css\"";
// $title = "Shop";


$media = formulation_media();

$content = media_show($media);



//barre de recherche pour un seul mot 
if (isset($_GET['search']) && $_GET['search'] == "")
{
    $content = media_show($media);

}
else if (isset($_GET['search']))
{
    //var_dump($_GET['search']);
    $mots = explode(" ",$_GET['search']);

    //on enleve les espaces en trop 
    foreach($mots as $key => $value)
    {
        if ($value == "")
        {
            unset($mots[$key]);
        }
    }

    $stock = [];

    foreach($mots as $key => $value)
    {
        $stock = array_merge($stock,search_result($value));
    }

    $content = media_show($stock);
    //print_r($stock);
}
else
{
    $content = media_show($media);
}

require('.\view\main_page.php');
?>