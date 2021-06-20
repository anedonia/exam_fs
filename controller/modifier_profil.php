<?php
if (empty($_SESSION['id_user'])){
    header('Location: routeur.php');
    exit();
}
require('.\model\modifier_profil.php');
require('modules\module_modifier_profil.php');



require('.\view\modifier_profil.php');
?>