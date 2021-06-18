<?php

function afficher_formulaire(){
    echo'
    <form action="" method="POST">
        <input type="text" name="pseudo" placeholder="pseudo" required>
        <input type="password" name="mdp" placeholder="password" required>
        <input type="text" name="last_name" placeholder="prenom" required>
        <input type="text" name="first_name" placeholder="nom" required>
        <input type="text" name="email" placeholder="email" required>
        <input type="submit" value="envoyer" name="sub">
    </form>
    <a href="routeur.php">Retour</a>';
}

?>