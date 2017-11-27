<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/index.css">
        <title>Accueil</title>
    </head>
    <body>
        <?php include("./sql/database.php"); ?>

        <?php include("./inc/header.php"); ?>

        <div class="container" id="tab-content">

            <div class="row">




        <?php
            $articles = 9;
            $res = $pdo->query('SELECT COUNT(*) AS TOTAL FROM T_ARTICLE')->fetch();
            $total = $res['TOTAL'];

            $pages = ceil($total / $articles);

            $page = (isset($_GET['page']) ? intval($_GET['page']) : 1);
            $page = min(max(1, $page), $pages);

            $start = ($page - 1) * $articles;

            $req = $pdo->prepare('SELECT ID_ARTICLE, ID_CATEGORIE, ART_NOM, ART_PRIX, ART_DESCRIPTION, ART_ETAT, ART_IMAGE, ART_DATE FROM T_ARTICLE ORDER BY ID_ARTICLE DESC LIMIT :start, :end');
            $req->bindParam(":start", $start, PDO::PARAM_INT);
            $req->bindParam(":end", $articles,  PDO::PARAM_INT);
            $req->execute();

            foreach ($req->fetchAll() as $row) { ?>
                <div class="col-4">
                    <article>
                        <!-- <img  />-->
                        <img src="assets/articles/<?php echo $row['ART_IMAGE']?>" />
                        <h3><?php echo $row['ART_NOM']; ?><span class="pull-right"><?php echo $row['ART_PRIX']; ?> €</span></h3>
                        <p><?php echo $row['ART_DESCRIPTION']; ?></p>
                    </article>
                </div>
            <?php }
            //$req = $pdo->query('SELECT ID_ARTICLE, ID_CATEGORIE, ART_NOM, ART_PRIX, ART_DESCRIPTION, ART_ETAT, ART_IMAGE, ART_DATE FROM T_ARTICLE ORDER BY ID_ARTICLE');



         ?>
</div>
         </div>

        <script src="lib/js/jquery.min.js"></script>
        <script src="lib/js/popper.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>

        <script>
            var array = $("#tab-content p");
            for (var i = 0; i < array.length; i++) {
                var el = array[i];
                var text;
                while (el.clientHeight < el.scrollHeight) {
                    text = el.innerHTML.trim();
                    el.innerHTML = text.replace(/\W*\s(\S)*$/, '...');
                }
            }
        </script>
    </body>
</html>
