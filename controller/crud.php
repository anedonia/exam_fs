<?php
require('.\model\crud.php');

if(!empty($_GET['supprimer'])){         //si dans le get il y a supprimer=id
    del_user($_GET['supprimer']);
    ob_start();
    echo'supprimer';
    $content = ob_get_clean();
    header('Location: routeur.php?action=crud');

}elseif(!empty($_GET['modifier'])){     //si dans le get il y a modifier=id
    if($_GET['modifier'] != 'True'){
        ob_start();
        echo'modifier id = '.$_GET['modifier'].' :';
        affichage_form_modif();
        $content = ob_get_clean();
    }else{
        update_all();
        ob_start();
        echo'modified';
        $content = ob_get_clean();
        header('Location: routeur.php?action=crud');
    }

}elseif(!empty($_GET['ajouter'])) {     //si dans le get il y a ajouter=OK
    if($_GET['ajouter'] != 'True'){
        ob_start();
        echo'ajouter une ligne :';
        affichage_form_add();
        $content = ob_get_clean();
    }else{
        add_user($_GET['first_name'], $_GET['last_name'], $_GET['email'], $_GET['password'], $_GET['role'], $_GET['login_name']);
        ob_start();
        echo'added';
        $content = ob_get_clean();
        header('Location: routeur.php?action=crud');
    }
}else{                                  //si dans le get il y a pas supp ni modif
    ob_start();
    affichage_ligne();
    //var_dump(select_all_user());
    $content = ob_get_clean(); 
}

require('.\view\crud.php');
?>