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
		<div class ="container">
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
        </div>
        <?php
            $users = array();
            foreach (file(".htpasswd") as $line) {
                $split = explode(":", $line);
                $users[] = array($split[0], $split[1]);
            }

            print_r($users);

              ?>


        <script src="lib/js/jquery.min.js"></script>
        <script src="lib/js/popper.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
    </body>
</html>
