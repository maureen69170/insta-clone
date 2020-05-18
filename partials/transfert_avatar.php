<?php
function transfertAvatar ()
{
    global $bdd;
    $user_id = $_SESSION["user_id"];

    $hasFile = isset ($_FILES['profil_photo']['tmp_name']);
    if ( !$hasFile )
    {
        throw new Exception("problème de transfert");
    }

    //fichier bien reçu

    /*$type_image = $_FILES['profil_photo']['type'];*/

    move_uploaded_file($_FILES['profil_photo']['tmp_name'],
        __DIR__.
        DIRECTORY_SEPARATOR.
        "..".DIRECTORY_SEPARATOR."uploads"
        .DIRECTORY_SEPARATOR.$_FILES['profil_photo']['name']
    );

    $image_url = $_FILES['profil_photo']['name'];

    $updateUserStatement = $bdd->prepare("UPDATE users
                      SET profil_photo = ?
                      WHERE id = ?");

    $updateUserStatement->execute(array($image_url, $user_id));

};
