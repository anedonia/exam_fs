<?php

function db_connect(){
    try
    {
        $pdo = new PDO('mysql:host=localhost;dbname=exam_fs','root','');
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
        //echo 'connextion réussie';
        return $pdo;
    }
    catch (PDOException $e)
    {
        echo "bug lors de la co ac la bdd";
    }
}

function ajout_user($pseudo, $nom, $prenom, $email, $mdp){
    $pdo = db_connect();
    //INSERT INTO `user` (`id_user`, `fisrt_name`, `last_name`, `email`, `psw`, `role`, `//`, `login_name`) VALUES (NULL, 'antonin', 'herve', 'anto@gmail.com', 'bite', NULL, NULL, 'antoroute');
    $req = $pdo->prepare('INSERT INTO `user` (`id_user`, `fisrt_name`, `last_name`, `email`, `psw`, `role`, `login_name`) VALUES (NULL, ?, ?, ?, ?, NULL, ?);');
    $req->execute(array($prenom, $nom, $email, $mdp, $pseudo));
}
?>