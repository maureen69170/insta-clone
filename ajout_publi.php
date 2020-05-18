<?php
include ('connect/connect.php');
include ("partials/transfert.php");
if ( isset ($_FILES['fic']) )
{
    transfert();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajouter une publication</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/ajout_publi.css">
</head>
<body>
<header>
    <?php include ('partials/navbar.php'); ?>
</header>
<main>
    <section class="container">
        <div class="row">
            <div class="col-12">
                <div class="contain animated bounce">
                <form id="form1" enctype="multipart/form-data" action="#" method="post">
                    <div class="alert"></div>
                    <div id='img_contain'>
                        <img id="blah" src="img/logo_ajout.png" alt="your image" title=''/>
                    </div>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" name="fic" id="inputGroupFile01" class="imgInp custom-file-input" aria-describedby="inputGroupFileAddon01" size=50>
                            <label class="custom-file-label" for="inputGroupFile01">Choisir une image</label>
                        </div>
                    </div>
                    <label for="description">Texte image</label><br>
                    <textarea name="description" placeholder="Entrer une texte pour accompagner votre photo ici..."></textarea><br>
                    <input type="reset" class="btn btn-reset" value="Effacer">
                    <input type="submit" class="btn btn-submit" value="Envoyer" />
                </form>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/preview_img.js"></script>
</body>
</html>
