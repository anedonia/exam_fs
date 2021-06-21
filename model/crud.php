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

function bdd($requete){
    $bddUser = 'root';
    $bddMdp = '';
    try {
        $db = new PDO ('mysql:host=localhost;dbname=exam_fs', $bddUser, $bddMdp);
        $requete_array = [];
        foreach($db->query($requete) as $row){
            array_push($requete_array, $row);
    }
    return $requete_array;
    }catch(PDOException $e){
        echo 'erreur : '. $e->getMessage()."<br/>".$requete;
        die;
    }
}

function select_all_user(){
    $bddUser = 'root';
    $bddMdp = '';
    try {
        $db = new PDO ('mysql:host=localhost;dbname=exam_fs', $bddUser, $bddMdp);
        $requete_array = [];
        foreach($db->query('SELECT * from `user`') as $row){
            array_push($requete_array, $row);
    }
    return $requete_array;
    }catch(PDOException $e){
        echo 'erreur : '. $e->getMessage()."<br/>";
        die;
    }
}

function affichage_ligne(){
    $tableau = select_all_user();
    echo'
    <table>
        <thead>
            <tr>
                <th colspan="99">USER</th>
            </tr>
            <tr>
                <th>id user</th>
                <th>first name</th>
                <th>last name</th>
                <th>email</th>
                <th>psw</th>
                <th>role</th>
                <th>login name</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>';
    
    foreach ($tableau as $key => $value) {
        echo'
        <tr>
            <td>'.$value["id_user"].'</td>
            <td>'.$value["first_name"].'</td>
            <td>'.$value["last_name"].'</td>
            <td>'.$value["email"].'</td>
            <td>'.$value["psw"].'</td>
            <td>'.$value["role"].'</td>
            <td>'.$value["login_name"].'</td>
            <td><a href="routeur.php?action=crud&modifier='.$value["id_user"].'">modifier</a></td>
            <td><a href="routeur.php?action=crud&supprimer='.$value["id_user"].'">supprimer</a></td>
        </tr>';
    }
    
    echo'<tr><td><a href="routeur.php?action=crud&ajouter=True">ajouter</a></td></tr></tbody></table>';
}

function del_user($id_user){
    bdd('DELETE FROM `user` WHERE `id_user` = '.$id_user.';');
}

function affichage_form_modif(){
    echo'
    <form action="" method="GET">
        <input type="hidden" name="action" value=crud>
        <input type="hidden" name="modifier" value="True">
        <input type="hidden" name="modified" value='.$_GET["modifier"].'>
        <input type="text" name="first_name" placeholder="first_name"><br>
        <input type="text" name="last_name" placeholder="last_name"><br>
        <input type="text" name="email" placeholder="email"><br>
        <input type="text" name="password" placeholder="password"><br>
        <input type="text" name="role" placeholder="role"><br>
        <input type="text" name="login_name" placeholder="pseudo"><br>
        <input type="submit">
    </form>';
}

function update_user($structure, $arg){
    $pdo = db_connect();
    $req = $pdo->prepare('UPDATE `user` SET `'.$structure.'` = "'.$arg.'" WHERE `user`.`id_user` = "'.$_GET["modified"].'";');
    $req->execute();
}
?>