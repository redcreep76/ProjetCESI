<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="x-ua-compatible" content="ie=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <title> Le Bon Cesi - Merci </title>
        <link rel="stylesheet" href="lib/css/bootstrap.min.css" />
        <link rel="stylesheet" href="lib/css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/header.css" />
        <link rel="stylesheet" href="css/connexion.css" />
	</head>

	<body>
		<?php
            session_start();
            include('sql/database.php');

            if (isset($_SESSION['user'])) {
                header('Location: index.php');
            }

            if (isset($_POST['submit'])) {
                $req = $pdo->prepare('SELECT ID_UTILISATEUR, UTI_EMAIL, UTI_MDP FROM T_UTILISATEUR WHERE UTI_EMAIL = :email AND UTI_MDP = SHA2(:mdp, 256)');
                $req->bindParam(":email", $_POST['email']);
                $req->bindParam(":mdp", $_POST['password']);
                $req->execute();

                if ($req->rowCount() > 0) {
                    $row = $req->fetch();
                    $_SESSION['user'] = $row['ID_UTILISATEUR'];
                    $_SESSION['timeout'] = time();
                    header('Location: index.php');
                }
            }
	        include('inc/header.php');
        ?>

         <div class ="container py-5">
              <div class="row">
                  <div class="col-6 mx-auto py-5 panel">
                      <h2 class="text-center mb-5">Formulaire d'Inscription</h2>
                      <form method="post">
                              <div class="form-group d-flex justify-content-end align-items-center col-10 mx-auto">
                                  <label class="h6 text-right form-label mr-3" for="nom">Adresse Mail <sup class="text-danger h6">*</sup></label>
                                  <input type="email" name="email" class="form-control col-8 <?php if (isset($_SESSION['erreur']['nom'])) echo 'input-invalid'; ?>" oninput="verifPattern(this, '^[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü\\s\\-]{3,30}$');" value="<?php if (isset($_SESSION['value']['nom'])) echo $_SESSION['value']['nom']; ?>" id="nom" required />
                              </div>
                              <div class="form-group d-flex justify-content-end align-items-center col-10 mx-auto">
                                  <label class="h6 text-right form-label mr-3" for="prenom">Mot de Passe <sup class="text-danger h6">*</sup></label>
                                  <input type="password" name="password" class="form-control col-8 <?php if (isset($_SESSION['erreur']['prenom'])) echo 'input-invalid'; ?>" oninput="verifPattern(this, '^[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü\\s\\-]{3,30}$');" value="<?php if (isset($_SESSION['value']['prenom'])) echo $_SESSION['value']['prenom']; ?>" id="prenom" required />
                              </div>

                              <div class="col-12 text-center mt-5 mb-3">
                                  <button type="submit" name="submit" class="btn btn-primary">Se connecter</button>
                              </div>
                              <div class="col-12 text-center">
                                  <a href="inscription.php" class="petit">Je n'ai pas de compte</a>
                                  <span class="ml-4">Mot de passe oublié ? </span>

                              </div>
                      </form>
                  </div>
              </div>
          </div>

        <script src="lib/js/jquery.min.js"></script>
        <script src="lib/js/popper.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
    </body>
</html>
