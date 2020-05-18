<?php
include ('connect/connect.php');
date_default_timezone_set('Europe/Paris');
if (!empty($_POST['nickname'])){
    $nickname = htmlspecialchars($_POST['nickname']);

    $userStatement = $bdd->prepare('SELECT * FROM users WHERE nickname = ?');
    $userStatement->execute([$_POST['nickname']]);

    $user = $userStatement->fetch(PDO::FETCH_ASSOC);

    if ($user){
        $userId = $user['id'];
        print_r('PPL2');

    }else{
        //insert new user
        print_r('PPL3');

        $insertUserStatement = $bdd->prepare('INSERT INTO users(nickname, profil_photo, mail, presentation, created_at ) VALUES (?, ?, ?, ?, ?)');
        $insertUserStatement->execute([$nickname, ' ', ' ', ' ', date('Y-m-d H:i:s')]);
        $userId = $bdd->lastInsertId();


    }
    $_SESSION["user_id"] = $userId;
    header('Location: profil.php');
}else{
    header('Location: index.php');
}

