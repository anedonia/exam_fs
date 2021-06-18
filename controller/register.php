<?php
require('modules\module_register.php');
require('.\model\register.php');

if(!empty($_POST["sub"])){
    ajout_user($_POST['pseudo'], $_POST['first_name'], $_POST['last_name'], $_POST['email'], sha1($_POST['mdp']));
    ob_start();
    var_dump($_POST);
    echo'c bon';
    $content = ob_get_clean();
    header('Location: routeur.php');
}else{
    ob_start();
    afficher_formulaire();
    $content = ob_get_clean();
}

require('.\view\register.php');
?>