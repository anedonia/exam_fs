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

    //fonction qui return le titre /media.id_media,media.media_name,media.media_price,auteur.last_name/ de chaque media sous forme de tab assoc
    function formulation_media()
    {
        $bdd = db_connect();

        $sql = 
        'SELECT media.id_media,media.media_name,media.media_price,auteur.last_name
        FROM media
        JOIN fait_par ON media.id_media = fait_par.id_media
        JOIN auteur ON fait_par.id_auteur = auteur.id_auteur';     //le total n'est set que quand on passe la commande (filtrage)

        $req = $bdd -> prepare ($sql) ;
        $req->execute();
        $data = $req->fetchAll();
        
        return $data;           
    }


    // fonction de recherche de media

    function search_result($mot)
    {
    
    $bdd = db_connect();

    $sql = 'SELECT media.id_media,media.media_name,media.media_price,auteur.last_name
    FROM media
    JOIN fait_par ON media.id_media = fait_par.id_media
    JOIN auteur ON fait_par.id_auteur = auteur.id_auteur
    where media.media_name like CONCAT("%", ? , "%")
    OR auteur.last_name like CONCAT("%", ? , "%") ';     

    $req = $bdd -> prepare ($sql);
    $req->execute([$mot,$mot]);

    $data = $req->fetchAll();

    return $data;
    }




/* requete qui donne le nom prenom auteur d'un media
SELECT media.id_media,media.media_name,media.media_price,auteur.last_name
FROM media
JOIN fait_par ON media.id_media = fait_par.id_media
JOIN auteur ON fait_par.id_auteur = auteur.id_auteur
*/