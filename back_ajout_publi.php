<?php
include ('connect/connect.php');
date_default_timezone_set('Europe/Paris');
if (!empty($_POST['image_url'])){
    $imageUrl = htmlspecialchars($_POST['image_url']);
    $imageDescription = htmlspecialchars($_POST['description']);

    $photoStatement = $bdd->prepare('SELECT * FROM photos WHERE image_url = ?');
    $photoStatement->execute([$_POST['image_url']]);

    $photo = $photoStatement->fetch(PDO::FETCH_ASSOC);

    if ($photo){
        $photoId = $photo['id'];
        print_r('PPL2');

    }else{
        //insert new user
        print_r('PPL3');

        $insertPhotoStatement = $bdd->prepare('INSERT INTO photos(image_url, description, created_at ) VALUES (?, ?, ?)');
        $insertPhotoStatement->execute([$imageUrl, $imageDescription, date('Y-m-d H:i:s')]);
        $photoId = $bdd->lastInsertId();


    }
    $_SESSION["user_id"] = $photoId;
    header('Location: profil.php');
}else{
    header('Location: ajout_publi.php');
}

