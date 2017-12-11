<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/inscription.css">
        <link rel="stylesheet" href="css/header.css">
        <title>Inscription - Cesi Coin</title>
    </head>

    <body>
        <?php
            session_start();
            include('sql/database.php');

            if (isset($_SESSION['user'])) {
                header('Location: index.php');
            }

            $regexName = "^[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü\s\-]{3,30}$";
            $regexEmail = "^[\w\-\.]+@[\w\-\.]+\.[\w\-]{2,4}$";
            $regexPassword = "^[.\S]{4,16}$";
            $regexPhone = "^0[1-9]([\-\.\s]?[0-9]{2}){4}$";
            $invalidClass = "input-invalid";
            $nom = (isset($_POST['nom']) ? $_POST['nom'] : "");
            $prenom = (isset($_POST['prenom']) ? $_POST['prenom'] : "");
            $email = (isset($_POST['email']) ? $_POST['email'] : "");
            $telephone = (isset($_POST['telephone']) ? $_POST['telephone'] : "");
            $password = (isset($_POST['password']) ? $_POST['password'] : "");
            $confirmation = (isset($_POST['confirmation']) ? $_POST['confirmation'] : "");

            if (isset($_POST['submit'])) {
                $req = $pdo->prepare('SELECT ID_UTILISATEUR FROM T_UTILISATEUR WHERE UTI_EMAIL = :email');
                $req->bindParam(':email', $_POST['email']);
                $req->execute();

                $error = array();

                if (!preg_match('/'.$regexName.'/', $_POST['nom'])) {
                    $error['nom'] = 'Votre nom doit faire entre 3 et 30 caractères et ne peux pas contenir de caractères spéciaux.';
                }

                if (!preg_match('/'.$regexName.'/', $_POST['prenom'])) {
                    $error['prenom'] = 'Votre prénom doit faire entre 3 et 30 caractères et ne peux pas contenir de caractères spéciaux.';
                }

                if (!preg_match('/'.$regexEmail.'/', $_POST['email'])) {
                    $error['email'] = 'Votre adresse mail est invalide.';
                } else  if ($req->rowCount() > 0) {
                    $error['email'] = 'Cette adresse mail est déjà enregistrée.';
                }

                if ((!empty($_POST['telephone'])) && (!preg_match('/'.$regexPhone.'/', $_POST['telephone']))) {
                    $error['telephone'] = 'Votre numéro de téléphone est invalide.';
                }

                if (!preg_match('/'.$regexPassword.'/', $_POST['password'])) {
                    $error['password'] = 'Votre mot de passe doit contenir entre 4 et 16 caractères et ne peux pas contenir d\'espace';
                }

                if ($_POST['confirmation'] !=  $_POST['password']) {
                    $error['confirmation'] = 'Votre confirmation de mot de passe et votre mot de passe ne correspondent pas.';
                }

                if (empty($error)) {
                    $req = $pdo->prepare('INSERT INTO T_UTILISATEUR (UTI_PRENOM, UTI_NOM, UTI_MDP, UTI_EMAIL) VALUES (:prenom, :nom, SHA2(:mdp, 256), :email)');
                    $req->bindParam(':prenom', $_POST['prenom']);
                    $req->bindParam(':nom', $_POST['nom']);
                    $req->bindParam(':mdp', $_POST['password']);
                    $req->bindParam(':email', $_POST['email']);
                    $req->execute();
                    $_SESSION['logged'] = time();
                    header('Location: index.php');
                }
            }

            include('inc/header.php');
        ?>

    	<div class ="container py-5">
            <div class="row">
                <div class="col-8 mx-auto py-5 panel">
                    <h2 class="text-center">Formulaire d'Inscription</h2>

                    <?php if (!empty($error)) { ?>
                        <div class="alert alert-danger pt-4 my-5">
                            <p class="mb-2"><strong>Les erreurs suivantes sont survenues :</strong></p>
                            <ul>
                                <?php foreach ($error as $msg) { ?>
                                    <li><?php echo $msg; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
                    <form method="post">
                        <div class="col-12 d-flex justify-content-around py-1">
                            <div class="form-group col-5">
                                <label class="h6 form-label" for="nom">Nom <sup class="text-danger h6">*</sup></label>
                                <input type="text" name="nom" class="form-control <?php if (isset($error['nom'])) echo $invalidClass; ?>" value="<?php echo $nom; ?>" oninput="verifPattern(this, '<?php echo str_replace('\\', '\\\\', $regexName); ?>');" id="nom" required />
                            </div>

                            <div class="form-group col-5">
                                <label class="h6 form-label" for="prenom">Prénom <sup class="text-danger h6">*</sup></label>
                                <input type="text" name="prenom" class="form-control <?php if (isset($error['prenom'])) echo $invalidClass; ?>"  value="<?php echo $prenom; ?>" oninput="verifPattern(this, '<?php echo str_replace('\\', '\\\\', $regexName); ?>');" id="prenom" required />
                            </div>
                        </div>



                        <div class="col-12 d-flex justify-content-around py-1">
                            <div class="form-group col-5">
                                <label class="h6 form-label" for="email">Adresse Mail <sup class="text-danger h6">*</sup></label>
                                <input type="email" name="email" class="form-control <?php if (isset($error['email'])) echo $invalidClass; ?>" value="<?php echo $email; ?>" oninput="verifPattern(this, '<?php echo str_replace('\\', '\\\\', $regexEmail); ?>');" id="email" required />
                            </div>

                            <div class="form-group col-5">
                                <label class="h6 form-label" for="telephone">Numéro de Téléphone</label>
                                <input type="tel" name="telephone" class="form-control <?php if (isset($error['telephone'])) echo $invalidClass; ?>" value="<?php echo $telephone; ?>" oninput="verifPattern(this, '<?php echo str_replace('\\', '\\\\', $regexPhone); ?>');" id="telephone" />
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-around py-1">
                            <div class="form-group col-5">
                                <label class="h6 form-label" for="password">Mot de Passe <sup class="text-danger h6">*</sup></label>
                                <input type="password" name="password" class="form-control <?php if (isset($error['password'])) echo $invalidClass; ?>" value="<?php echo $password; ?>" oninput="verifPassword(this, confirmation, '<?php echo str_replace('\\', '\\\\', $regexPassword); ?>');" id="password" required />
                            </div>

                            <div class="form-group col-5">
                                <label class="h6 form-label" for="confirmation">Confirmation du Mot de Passe <sup class="text-danger h6">*</sup></label>
                                <input type="password" name="confirmation" class="form-control <?php if (isset($error['confirmation'])) echo $invalidClass; ?>" value="<?php echo $confirmation; ?>" oninput="verifPassword(password, this, '<?php echo str_replace('\\', '\\\\', $regexPassword); ?>');" id="confirmation" required />
                            </div>
                        </div>

                        <div class="col-12 text-center pt-4">
                            <div class="form-check h6">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" required>
                                    Je certifie être un salarié appartenant au CESI.
                                </label>
                            </div>
                            <p class="text-danger h6">
                                Les champs accompagnés d'une étoile sont obligatoires
                            </p>

                            <button type="submit" name="submit" class="btn btn-lg btn-primary mt-3">Valider</button>
                        </div>
                    </form>

                </div>

            </div>
	    </div>

    	<script src="lib/js/jquery.min.js"></script>
        <script src="lib/js/popper.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/inscription.js"></script>
    </body>

    <footer>
    </footer>
</html>
