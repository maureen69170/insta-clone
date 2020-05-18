<?php
function transfert ()
{
    global $bdd;
    $user_id = $_SESSION["user_id"];
    $description = $_POST['description'];

    $hasFile = isset ($_FILES['fic']['tmp_name']);
    if ( !$hasFile )
    {
        throw new Exception("problème de transfert");
    }

    //fichier bien reçu

    $type_image = $_FILES['fic']['type'];

    move_uploaded_file($_FILES['fic']['tmp_name'],
        __DIR__.
        DIRECTORY_SEPARATOR.
        "..".DIRECTORY_SEPARATOR."uploads"
        .DIRECTORY_SEPARATOR.$_FILES['fic']['name']
    );

    $image_url = $_FILES['fic']['name'];

    $insertPhotoStatement = $bdd->prepare(
        'INSERT INTO photos(user_id, image_url, type_image, description, created_at )
                    VALUES (?, ?, ?, ?, ?)');
    $insertPhotoStatement->execute([$user_id, $image_url, $type_image, $description, date('Y-m-d H:i:s')]);
};
