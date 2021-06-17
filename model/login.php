<?php

function db_connect()
{
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


function user_info($identifiant)
{
    $bdd = db_connect();

    $sql = 'SELECT * FROM `user` WHERE `login_name`= ?';
    $req = $bdd -> prepare($sql);
    $req->execute([$identifiant]);

    $data = $req->fetch();
            
    return $data;
}

function user_check($mdp, $identifiant)
    {
        $bdd = db_connect();

        $sql = 'SELECT id_user FROM user WHERE login_name = ? and psw = SHA1(?) ';
        $req = $bdd -> prepare ($sql) ;
        $req->execute([$identifiant, $mdp]);

        $data = $req->fetch();
        $row = $req->rowCount();        

        // si le row est égal à 1 alors un utilisateur ac le combo mdp/identifiant existe
        if ($row == 1 )
        {
            return true;
        }
    }
?>