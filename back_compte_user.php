<?php
include ('connect/connect.php');
date_default_timezone_set('Europe/Paris');
/*print_r($_POST['presentation']);*/

if (!empty($_POST['mail']) && !empty($_POST['presentation'])) {

    $mail = htmlspecialchars($_POST['mail']);
    $presentation = htmlspecialchars($_POST['presentation']);
    /*print_r('PPL1');*/
    $userStatement = $bdd->prepare('SELECT * FROM users WHERE id = ?');
    $userStatement->execute([$_SESSION['user_id']]);

    $user = $userStatement->fetch(PDO::FETCH_ASSOC);

    /*die('<pre>'.print_r($user, true).'</pre>');*/
    if ($user){
        $userId = $user['id'];
        $updateUserStatement = $bdd->prepare("UPDATE users
                      SET mail = ?, presentation = ?
                      WHERE id = ?");

        $updateUserStatement->execute(array($mail, $presentation, $userId));
        /*print_r('PPL2');*/
        include ('partials/transfert_avatar.php');
        if ( isset ($_FILES['profil_photo']) )
        {
            transfertAvatar();
        }


    }
    $_SESSION["user_id"] = $userId;
    header('Location: profil.php');
}else{
    print_r('PPL4');
    /*header('Location: index.php');*/
}


