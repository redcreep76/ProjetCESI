<?php
    session_start();
    include('sql/database.php');

    $req = $pdo->prepare('SELECT ID_UTILISATEUR FROM T_UTILISATEUR WHERE UTI_EMAIL = :email');
    $req->bindParam(':email', $_POST['email']);
    $req->execute();

    $_SESSION['value'] = array(
        "prenom" => $_POST['prenom'],
        "nom" => $_POST['nom'],
        "telephone" => $_POST['telephone'],
        "email" => $_POST['email'],
        "password" => $_POST['password'],
        "confirmation" => $_POST['confirmation']
    );

    $_SESSION['erreur'] = array();

    if (!preg_match('/^[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü\s\-]{3,30}$/', $_POST['nom'])) {
        $_SESSION['erreur']['nom'] = 'Votre nom doit faire entre 3 et 30 caractères et ne peux pas contenir de caractères spéciaux.';
    }

    if (!preg_match('/^[a-zA-Zàáâäçèéêëìíîïñòóôöùúûü\s\-]{3,30}$/', $_POST['prenom'])) {
        $_SESSION['erreur']['prenom'] = 'Votre prénom doit faire entre 3 et 30 caractères et ne peux pas contenir de caractères spéciaux.';
    }

    if (!preg_match('/^[\w\-\.]+@[\w\-\.]+\.[\w\-]{2,4}$/', $_POST['email'])) {
        $_SESSION['erreur']['email'] = 'Votre adresse mail est invalide.';
    } else  if ($req->rowCount() > 0) {
        $_SESSION['erreur']['email'] = 'Cette adresse mail est déjà enregistrée.';
    }

    if ((!empty($_POST['telephone'])) && (!preg_match('/^0[1-9]([\-\.\s]?[0-9]{2}){4}$/', $_POST['telephone']))) {
        $_SESSION['erreur']['telephone'] = 'Votre numéro de téléphone est invalide.';
    }

    if (!preg_match('/^[.\S]{4,16}$/', $_POST['password'])) {
        $_SESSION['erreur']['password'] = 'Votre mot de passe doit contenir entre 4 et 16 caractères et ne peux pas contenir d\'espace';
    }

    if ($_POST['confirmation'] !=  $_POST['password']) {
        $_SESSION['erreur']['confirmation'] = 'Votre confirmation de mot de passe et votre mot de passe ne correspondent pas.';
    }

    if (empty($_SESSION['erreur'])) {
        unset($_SESSION['erreur']);
        unset($_SESSION['value']);
        $req = $pdo->prepare('INSERT INTO T_UTILISATEUR (UTI_PRENOM, UTI_NOM, UTI_MDP, UTI_EMAIL) VALUES (:prenom, :nom, :mdp, :email)');
        $req->bindParam(':prenom', $_POST['prenom']);
        $req->bindParam(':nom', $_POST['nom']);
        $req->bindParam(':mdp', crypt($_POST['password'], CRYPT_SHA256));
        $req->bindParam(':email', $_POST['email']);
        $req->execute();
        $_SESSION['logged'] = time();
        header('Location: remerciement.php');
    } else {
        header('Location: inscription.php');
    }
?>
