<?php
include ('connect/connect.php');
/*include ("partials/transfert.php");
if ( isset ($_FILES['fic']) )
{
    transfert();
}*/
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compte User</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/compte_user.css">
</head>
<body>
<header>
    <?php include ('partials/navbar.php'); ?>
</header>
<div class="container onglet">
    <div class="row">
        <div class="col-6 offset-6 onglet-actif">
            <h3>Bienvenue sur votre compte !</h3>
            <p>Compléter ou modifier vos informations !</p>
        </div>
    </div>
</div>
<section class="container">
    <div class="row">
        <div class="col-12">
            <h3></h3>
            <img src="" alt="">
            <p></p>
            <p></p>
        </div>
        <div class="col-12 form_div">
            <form enctype="multipart/form-data" action="back_compte_user.php" method="post">
                <input type="hidden" name="MAX_FILE_SIZE" value="250000" />
                <label for="photo_profil">Photo de Profil</label><br>
                <input type="file" class="btn btn-file" name="profil_photo" size=50 /><br>
                <label for="email">Mail</label><br>
                <input type="email" class="input-mail" name="mail" placeholder=""><br>
                <label for="presentation">Description</label><br>
                <textarea name="presentation" placeholder="Entrer une presentation de votre profil ici..."></textarea><br>
                <input type="reset" class="btn btn-reset" value="Effacer">
                <input type="submit" class="btn btn-submit" value="Envoyer" />
            </form>
        </div>
    </div>
</section>

</body>
</html>
