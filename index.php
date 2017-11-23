<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/index.css">
        <title>Accueil</title>
    </head>
    <body>
        <?php include("./sql/database.php"); ?>

        <?php include("./inc/header.php"); ?>
        <?php
            $articles = 9;
            $res = $pdo->query('SELECT COUNT(*) AS TOTAL FROM T_ARTICLE')->fetch();
            $total = $res['TOTAL'];

            $pages = ceil($total / $articles);

            $page = (isset($_GET['page']) ? intval($_GET['page']) : 1);
            $page = min(max(1, $page), $pages);

            $start = ($page - 1) * $articles;

            foreach ($pdo->query('SELECT ID_ARTICLE, ID_CATEGORIE, ART_NOM, ART_PRIX, ART_DESCRIPTION, ART_ETAT, ART_IMAGE, ART_DATE FROM T_ARTICLE ORDER BY ID_ARTICLE DESC LIMIT '.$start.', '.$articles)->fetchAll() as $row) {
                
            }
            //$req = $pdo->query('SELECT ID_ARTICLE, ID_CATEGORIE, ART_NOM, ART_PRIX, ART_DESCRIPTION, ART_ETAT, ART_IMAGE, ART_DATE FROM T_ARTICLE ORDER BY ID_ARTICLE');



         ?>

        <div class="container">
            <div class="row justify-content-center">
	            <div class="co-10 col-md-6 col-lg-5 popup">
                    <p class="titre">Identifiez-vous :</p>
	                <form method = "post" action = "traitement.php">
						<label class="col-6" for ="identifiant"> Identifiant : </label>
                        <input type="text" class="col-6" name="identifiant" placeholder="Ex: V@lentin" id="identifiant">

						<label for="pass"> Mot de passe : </label>
                        <input type="password" class = "col-6 inputte" name="pass" id="pass">

						<input type="submit" name="connexion" value ="S'identifier">
	                </form>
                </div>
            </div>


        <div>
            <a href="test">Test</a>
        </div>
        <?php
            echo realpath("index.php");
            echo crypt('kangourou', base64_encode('kangourou'));

            $users = array();
            foreach (file(".htpasswd") as $line) {
                $split = explode(":", $line);
                $users[] = array($split[0], $split[1]);
            }

            print_r($users);

              ?>

</div>
        <script src="lib/js/jquery.min.js"></script>
        <script src="lib/js/popper.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
    </body>
</html>
