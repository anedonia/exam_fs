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
    
    echo'<tr><td><a href="routeur.php?action=crud&ajouter=OK">ajouter</a></td></tr></tbody></table>';
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

function affichage_form_add(){
    echo'
    <form action="" method="GET">
        <input type="hidden" name="action" value=crud>
        <input type="hidden" name="ajouter" value=True>
        <input type="text" name="first_name" placeholder="first_name" required><br>
        <input type="text" name="last_name" placeholder="last_name" required><br>
        <input type="text" name="email" placeholder="email" required><br>
        <input type="text" name="password" placeholder="password" required><br>
        <input type="text" name="role" placeholder="role" required><br>
        <input type="text" name="login_name" placeholder="pseudo" required><br>
        <input type="submit">
    </form>';
}

function update_user($structure, $arg){
    $pdo = db_connect();
    $req = $pdo->prepare('UPDATE `user` SET `'.$structure.'` = "'.$arg.'" WHERE `user`.`id_user` = "'.$_GET["modified"].'";');
    $req->execute();
}

function add_user($first_name, $last_name, $email, $password, $role, $login_name){
    $pdo = db_connect();
    $req = $pdo->prepare('INSERT INTO `user` (`id_user`, `first_name`, `last_name`, `email`, `psw`, `role`, `login_name`) VALUES (NULL, ?, ?, ?, ?, ?, ?);');
    $req->execute(array($first_name, $last_name, $email, sha1($password), $role, $login_name));
}

function update_all(){
    if(!empty($_GET["first_name"])){
        update_user("first_name", $_GET["first_name"]);
    }
    if(!empty($_GET["last_name"])){
        update_user("last_name", $_GET["last_name"]);
    }
    if(!empty($_GET["email"])){
        update_user("email", $_GET["email"]);
    }
    if(!empty($_GET["password"])){
        update_user("psw", sha1($_GET["password"]));
    }
    if(!empty($_GET["role"])){
        update_user("role", $_GET["role"]);
    }
    if(!empty($_GET["login_name"])){
        update_user("login_name", $_GET["login_name"]);
    }
}
?>