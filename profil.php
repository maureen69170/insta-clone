<?php
include ('connect/connect.php');
$request = $bdd->prepare('SELECT * FROM users WHERE id = ?');
$request->execute([$_SESSION["user_id"]]);
$usersPseudo = $request->fetch(PDO::FETCH_ASSOC);

$allPhotosStatement = $bdd->prepare(
'SELECT photos.*, users.nickname 
    FROM photos
    INNER JOIN users 
    WHERE users.id = photos.user_id
    AND users.id = ?
    ORDER BY photos.created_at');
    $allPhotosStatement->execute([$_SESSION["user_id"]]);
$allPhotos = $allPhotosStatement->fetchAll(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page profil</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
          integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/profil.css">
</head>
<body>
<header>
<?php include ('partials/navbar.php'); ?>
</header>
<main>
    <div class="container">

        <div class="onglets">
            <div class="onglet actif">
                <div class="row">
                    <div class="col-6">

                        <h3 class="pseudo"><?php echo $usersPseudo['nickname'] ?></h3>
                    </div>
                    <div class="col-6">
                        <div class="image-circle">
                            <img src="uploads/<?php echo $usersPseudo['profil_photo'] ?>"/>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="contenu actif">
            <div class="row">
                <div class="col-12">
                    <h4>Description du profil :</h4>
                </div>
                <div class="col-12">
                    <p><?php echo $usersPseudo['presentation'] ?></p>
                </div>
            </div>
            <div class="row">
                <!--card new publication-->
                <div class="col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="ajout_publi.php"><img src="img/logo_ajout.png" class="images"></a>
                            <h5 class="card-title titre-publi">Ajouter une nouvelle publication</h5>
                        </div>
                    </div>
                </div>
                <?php foreach($allPhotos as $photo) : ?>
                <div class="col-lg-4 col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="https://picsum.photos/id/237/300/200"><img src="uploads/<?php echo $photo['image_url'] ?>" class="images"></a>
                            <p class="card-text"><?php echo $photo['description'] ?></p>
                            <!-- LikeBtn.com BEGIN -->
                            <span class="likebtn-wrapper" data-theme="custom" data-icon_l="hrt6"
                                  data-icon_l_c="#44107a" data-icon_l_c_v="#ff1361" data-icon_d_c="#ff1361"
                                  data-icon_d_c_v="#44107a" data-counter_l_c="#ff1361" data-counter_d_c="#44107a"
                                  data-f_family="Comic Sans MS" data-lang="fr" data-i18n_like="Like" data-ef_voting="grow"
                                  data-identifier="item_1" data-counter_clickable="true" data-counter_frmt="space"
                                  data-counter_zero_show="true" data-counter_count="true"></span>
                            <!-- LikeBtn.com END -->
                            <a href="#" class="card-link btn">Commentaires</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

        </div>
    </div>
</main>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script>
    (function(d,e,s){
        if(d.getElementById("likebtn_wjs"))return;
        a=d.createElement(e);
        m=d.getElementsByTagName(e)[0];
        a.async=1;
        a.id="likebtn_wjs";
        a.src=s;
        m.parentNode.insertBefore(a, m)
    })
    (document,"script","//w.likebtn.com/js/w/widget.js");
</script>
</body>
</html>
