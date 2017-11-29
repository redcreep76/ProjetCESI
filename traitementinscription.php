<?php

    include('sql/database.php');
    //Créer des constantes pour la taille minimale et maximale des champs ?
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $telephone = $_POST['telephone'];
    $pass = $_POST['pass'];
    $verifpass = $_POST['verifpass'];
    $email = $_POST['email'];
    $erreur = 0;

    $_SESSION['prenom'] = $_POST['prenom'];


    $req = $pdo->prepare('SELECT ID_UTILISATEUR FROM T_UTILISATEUR WHERE UTI_EMAIL = :email');
    $req->bindParam(':email', $_POST['email']);
    $req->execute();


    $_SESSION['erreur'] = array();

    if (verifNom($prenom) == false) {
        $_SESSION['erreur']['prenom'] = array(
            'param' => $prenom,
            'msg' => 'Le champs doit faire entre 2 et 25 caractères'
        );
    }

    if (verifNom($nom) == false)
    {
        $_SESSION['erreurnom'] = 'Le champs doit faire entre 2 et 25 caractères';
    }

    if (verifMdp($pass) == false)
    {
        $_SESSION['erreurpass'] = 'Le champs doit faire entre 4 et 16 caractères';
    }

    if (verifVerif($verifpass, $pass) == false)
    {
        $_SESSION['erreurverif'] = 'Erreur sur la vérification du mot de passe';
    }

    if (verifEmail($email) == false)
    {
        $_SESSION['erreuremail'] = 'Adresse email invalide.';
    }
    else if ($req->rowCount > 0)
    {
        $_SESSION['erreuremail'] = 'Adresse email indisponible';
    }

    if (verifTelephone($telephone) == false)
    {
        $_SESSION['erreurtelephone'] = 'Numéro de téléphone invalide';
    }

    if (empty($_SESSION['erreur'])) {
        unset($_SESSION['erreur']);
        $req = $bdd->prepare('INSERT INTO T_UTILISATEUR (UTI_PRENOM, UTI_NOM, UTI_MDP, UTI_EMAIL) VALUES (:prenom, :nom, :mdp, :email)');
        $req->bindParam(':prenom', $_POST['prenom']);
        $req->bindParam(':nom', $_POST['nom']);
        $req->bindParam(':mdp', $_POST['pass']);
        $req->bindParam(':email', $_POST['email']);
        $req->execut();
        $_SESSION['logged'] = time();
        header('Location: remerciement.php');
    } else {
        //die($_SESSION['erreur']['prenom']['param']);
        header('Location: inscription.php');
    }

    function verifNom($champs) {
        if ((strlen($champs) > 2) && (strlen($champs) < 25))	{
            return true;
        }
        return false;
    }

    function verifMdp($champs) {
        if ((strlen($champs) > 4) || (strlen($champs) > 25)) {
                return true;
        }
        return false;
    }

    function verifEmail($champs) {
        if ((strlen($champs) > 0) && (preg_match("/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/", $champs))) {
            return true;
        }
        return false;
    }

    function verifTelephone($champs) {
        if(strlen($champs) > 0) {
            if (preg_match("/^0[1-9]([-. ]?[0-9]{2}){4}$/", $champs)) {
                return true;
            }
            return false;
        }
        return true;
    }

    function verifVerif($verifpass,$pass) {
        if($verifpass == $pass) {
                return true;
        }
        return false;
    }
?>
