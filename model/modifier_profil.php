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

function select_user($id_user){
    $bdd = db_connect();

    $sql = 'SELECT `fisrt_name` FROM `user` WHERE id_user=?';
    $req = $bdd -> prepare($sql);
    $req->execute([$id_user]);

    $data = $req->fetch();
            
    return $data;
}

?>