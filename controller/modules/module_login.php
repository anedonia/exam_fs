<?php

function formulaire_login(){
    echo'
    <form action="" method="POST" id="signUpForm">
        <input type="text" name="pseudo" id="emailField" required>
        <input type="password" name="mdp" required>
        <input type="submit" value="connexion" id="okButton">
    </form>
    <form action="routeur.php" method="GET">
        <input type="submit" name="action" value="register">
    </form>';
}

?>