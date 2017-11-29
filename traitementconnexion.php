<?php
	session_start();

	//On envoie une requête à la base de données pour vérifier l'adresse mail et le mot de passe
	$req = $pdo->prepare('SELECT ID_UTILISATEUR, UTI_EMAIL, UTI_MDP FROM T_UTILISATEUR WHERE UTI_EMAIL = :email AND UTI_MDP = :mdp');
	$req->bindParam(":email", $_POST['email']);
	$req->bindParam(":mdp", $_POST['pass']);
	$req->execute();

	//On vérifie si la base de données retourne au moins un résultat
	if ($req->rowCount() > 0) {
		$row = $req->fetch();
		$_SESSION['utilisateur'] = $row['ID_UTILISATEUR'];
		$_SESSION['logged'] = time();

	//Sinon on affiche un message d'erreur à l'utilisateur
	} else {
		$_SESSION['failco'] = "L'adresse email ou le mot de passe est incorrect";
		header('Location: connexion.php');
	}
?>
