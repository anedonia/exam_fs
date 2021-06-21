<?php
require('.\model\crud.php');

if(!empty($_GET['supprimer'])){      //si dans le get il y a supprimer=id
    del_user($_GET['supprimer']);
    ob_start();
    echo'supprimer';
    $content = ob_get_clean();
    header('Location: routeur.php?action=crud');

}elseif(!empty($_GET['modifier'])){  //si dans le get il y a modifier=id
    if($_GET['modifier'] != 'True'){
        ob_start();
        echo'modifier id = '.$_GET['modifier'].' :';
        affichage_form_modif();
        $content = ob_get_clean();
    }else{
        update_user("email", "hamedoula@gmail.com");
        if(!empty($_GET["first_name"])){
            update_user("first_name", $_GET["first_name"]);
        }
        if(!empty($_GET["last_name"])){
            update_user("last_name", $_GET["last_name"]);
        }
        if(!empty($_GET["email"])){
            update_user("email", $_GET["email"]);
        }
        if(!empty($_GET["password"])){
            update_user("psw", $_GET["password"]);
        }
        if(!empty($_GET["role"])){
            update_user("role", $_GET["role"]);
        }
        if(!empty($_GET["login_name"])){
            update_user("login_name", $_GET["login_name"]);
        }
        ob_start();
        echo'modified';
        $content = ob_get_clean();
        //header('Location: routeur.php?action=crud');
    }

}else{                              //si dans le get il y a pas supp ni modif
    ob_start();
    affichage_ligne();
    //var_dump(select_all_user());
    $content = ob_get_clean(); 
}

require('.\view\crud.php');
?>