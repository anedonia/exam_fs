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
        update_all();
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