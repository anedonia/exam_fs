<?php
require('modules\module_login.php');
require('.\model\login.php');
if (!empty($_POST['pseudo']) && !empty($_POST['mdp'])){
    //var_dump(user_check($_POST['mdp'], $_POST['pseudo']));
    if (user_check($_POST['mdp'], $_POST['pseudo']) == True){
        $_SESSION = user_info($_POST['pseudo']);
        ob_start();
        echo'identified';
        $content = ob_get_clean();
        header('Location: routeur.php?action=main_page');
    }else{
        ob_start();
        echo'pas iden';
        $content = ob_get_clean();
        header('Location: routeur.php');
    }
}
else{
    ob_start();
    echo'connexion :';
    formulaire_login();
    $content = ob_get_clean();
}

include('.\view\login.php');
?>