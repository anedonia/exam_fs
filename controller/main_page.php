<?php

require('modules/module_main_page.php');
require('./model/main_page.php');
// $page_css = "\"./public/style_shop.css\"";
// $title = "Shop";


$media = formulation_media();

$content = media_show($media);

require('.\view\main_page.php');

?>