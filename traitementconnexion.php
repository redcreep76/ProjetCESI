<?php

session_start();

$emaill = $_POST['email'];
$mdpp = $_POST['pass'];
$compteur = 0;
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=projetcesi;charset=utf8','root','');

}
catch(Exception $e)
{
	die ('Erreur : '.$e->getMessage());
}

$reponse = $bdd->query ('SELECT utiemail,utipass,id_utilisateur FROM utilisateur');
while ($donnees = $reponse->fetch())
{
	if ($emaill == $donnees['utiemail'] && $mdpp == $donnees['utipass'])
	{
		$compteur++;
		$_SESSION['utilisateur'] = $donnees['id_utilisateur'];
	}
}

if ($compteur != 0)
{
	$_SESSION['isconnected'] = 1;
	header('Location: accueil.php');
}
else
{
	$_SESSION['failco'] ="L'adresse email ou le mot de passe est incorrect";
	header('Location: connexion.php');
}
?>