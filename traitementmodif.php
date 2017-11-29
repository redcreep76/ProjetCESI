<?php


 session_start();  

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=projetcesi;charset=utf8','root','');

}
catch(Exception $e)
{
	die ('Erreur : '.$e->getMessage());
}

//$valide = true;
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$telephone = $_POST['telephone'];
$image =  $_FILES['image'];

//die ($image['name']);







	function verif($champs)

	{
		if(strlen($champs) < 2 || strlen($champs) > 25)

		{
			 	
			
			return false;
		
		}
		return true;

	}



			

	

	function verifTelephone ($champs)
	{

		if(strlen($champs) > 0)
		{	

			if (preg_match("/^0[1-9]([-. ]?[0-9]{2}){4}$/", $champs))
			{
				   
				return true;
			
			}

			else 
			{

				return false;
			
			}   
					
		}
		else
		{
			return true;
		}

	}

	function verifImage($champs)
	{
		return true;
		/*if(strlen($champs) > 0 && strlen($champs) < 256)
		{
			return true;
		}
		else
		{
			return false;
		}*/
	}





			

if(verif($prenom) == true && verif($nom) == true  && verifTelephone($telephone) == true && verifImage($image) == true )
{
	
	$req = $bdd->prepare('UPDATE utilisateur SET utiprenom = ?, utinom = ?, utitelephone = ?, utiimage = ? WHERE id_utilisateur = ?');
	$req->execute(array($_POST['prenom'], $_POST['nom'],$_POST['telephone'],$image['name'], $_SESSION['utilisateur']));
	$_SESSION['coprenom'] = $_POST['prenom'];
	$_SESSION['conom'] = $_POST['nom'];
	$_SESSION['cotelephone'] = $_POST['telephone'];
	$_SESSION['coimage'] = $image['name'];
	header('Location: profil.php');
	
}

	
else
{	
	if (verif($prenom) == false)
	{
		$_SESSION['erreurprenom'] ='Le champs doit faire entre 2 et 25 caractères' ;
	}

	if (verif($nom) == false)
	{
		$_SESSION['erreurnom'] = 'Le champs doit faire entre 2 et 25 caractères';
	}

	if (verifTelephone($telephone) == false)
	{
		$_SESSION['erreurtelephone'] = 'Numéro de téléphone invalide';
	}
	
	if (empty($image) == true)
	{
		$_SESSION['erreurimage'] = 'Erreur lors du chargement de l\'image';
	}
	header('Location: modifprofil.php');
}




?>