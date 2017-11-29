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
$pass = $_POST['pass'];
$verifpass = $_POST['verifpass'];
$email = $_POST['email'];
$erreur = 0;

$_SESSION['prenom'] = $_POST['prenom'];





	function verif($champs)

	{
		if(strlen($champs) < 2 || strlen($champs) > 25)

		{
			 	
			
			return false;
		
		}
		return true;

	}

function verifMdp($champs)

	{
		if(strlen($champs) < 4 || strlen($champs) > 25)

		{
			 	
			
			return false;
		
		}
		return true;

	}



			

	function verifEmail($champs)

	{
				
		if (preg_match("/^[a-zA-Z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$/", $champs))
		{
				   	
			return true;
		}
		else
		{
			return false;
		}   

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




	function verifVerif ($verifpass,$pass)
	{
				
		if($verifpass == $pass)
		{
						
			return false;
		}

		else
		{
						
			return true;
		}
	}

	
$reponse = $bdd->query ('SELECT utiemail,utitelephone FROM utilisateur');
	while ($donnees = $reponse->fetch())
	{
		if($_POST['email'] == $donnees['utiemail'])
		{
			$erreur = 1 ;
		}
		
	}

			

if(verif($prenom) == true && verif($nom) == true && verifMdp($pass) == true && verifVerif($verifpass,$pass) == false && verifTelephone($telephone) == true && verifEmail($email) == true && $erreur == 0 )
{
	
	$req = $bdd->prepare('INSERT INTO utilisateur (utiprenom, utinom, utipass, utiemail, utitelephone) VALUES (?, ?, ?, ?, ?)');
	$req->execute(array($_POST['prenom'],$_POST['nom'], $_POST['pass'], $_POST['email'], $_POST['telephone'] ));
	header('Location: remerciement.php');
	
}



else
{
	if ($erreur == 1)
	{
		verifEmail($email) == false;
	}
	if (verif($prenom) == true)
	{
		 setcookie('prenom', $prenom, time() + 365*24*3600, null, null, false, true); 
	}

	if (verif($nom) == true)
	{
		 setcookie('nom', $nom, time() + 365*24*3600, null, null, false, true); 
	}

	if (verifEmail($email) == true)
	{
		 setcookie('email', $email, time() + 365*24*3600, null, null, false, true); 
	}

	if (verifTelephone($telephone) == true)
	{
		 setcookie('telephone', $telephone, time() + 365*24*3600, null, null, false, true); 
	}


	
	
	if (verif($prenom) == false)
	{
		$_SESSION['erreurprenom'] ='Le champs doit faire entre 2 et 25 caractères' ;
	}

	if (verif($nom) == false)
	{
		$_SESSION['erreurnom'] = 'Le champs doit faire entre 2 et 25 caractères';
	}

	if (verifMdp($pass) == false)
	{
		$_SESSION['erreurpass'] = 'Le champs doit faire entre 4 et 16 caractères';
	}

	if (verifVerif($verifpass) == true)
	{
		$_SESSION['erreurverif'] = 'Erreur sur la vérification du mot de passe';
	}	

	if (verifEmail($email) == false)
	{
		$_SESSION['erreuremail'] = 'Adresse email invalide.';
	}
	else if (verifEmail($email)==true && $erreur == 1)
	{
		$_SESSION['erreuremail'] = 'Adresse email indisponible';
	}

	if (verifTelephone($telephone) == false)
	{
		$_SESSION['erreurtelephone'] = 'Numéro de téléphone invalide';
	}
	
	header('Location: inscription.php');
}




?>