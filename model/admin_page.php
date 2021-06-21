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

    //fonction qui return  id_user, first_name, last_name, email, login_name  de chaque user sous forme de tab assoc
    function user_info()
    {
        $bdd = db_connect();

        $sql = 'SELECT id_user, fisrt_name, last_name, email, login_name FROM `user`';     //le total n'est set que quand on passe la commande (filtrage)

        $req = $bdd -> prepare ($sql) ;
        $req->execute();
        $data = $req->fetchAll();
        
        return $data;           
    }