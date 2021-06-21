<?php
if (empty($_SESSION['id_user'])){
    header('Location: routeur.php');
    exit();
}
require('modules/module_admin_page.php');
require('./model/admin_page.php');
// $page_css = "\"./public/style_shop.css\"";
// $title = "Shop";

$user = user_info();

$content = user_show($user);


require('.\view\admin_page.php');
?>