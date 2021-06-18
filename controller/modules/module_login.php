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
    </form>
    <script>
        const signUpForm = document.getElementById("signUpForm");
        const emailField = document.getElementById("emailField");
        const okButton = document.getElementById("okButton");
        
        emailField.addEventListener("keyup", function (event) {
        isValidEmail = emailField.checkValidity();
        
        if ( isValidEmail ) {
            okButton.disabled = false;
        } else {
            okButton.disabled = true;
        }
        });
        
        okButton.addEventListener("click", function (event) {
        signUpForm.submit();
        });
    </script>';
}

?>