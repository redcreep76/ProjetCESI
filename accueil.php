<?php 
session_start();

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=projetcesi;charset=utf8','root','');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(Exception $e)
{
    die ('Erreur : '.$e->getMessage());
}

$id = $_SESSION['utilisateur'];
$reponse = $bdd->query ('SELECT utiprenom,utinom,utiemail,utitelephone FROM utilisateur WHERE id_utilisateur = '.$id.'');
$utilisateur = $reponse->fetch();
$_SESSION['coprenom'] = $utilisateur['utiprenom'];
$_SESSION['conom'] = $utilisateur['utinom'];
$_SESSION['coemail'] = $utilisateur['utiemail'];
$_SESSION['cotelephone'] = $utilisateur['utitelephone'];
?>



<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="css/accueil.css">

        <title> Le Bon Cesi - Merci </title>
	</head>

	<body>
		 <?php
    	 include('sql/database.php');
    	 include('inc/header.php');

         ?>
        <div class="container taille col-xs-10 col-md-9 col-lg-9 text-center">
            <?php if($_SESSION['isconnected'] == 1){ ?>
            Bienvenue sur le site d'échange du CESI <?php echo $utilisateur['utiprenom'] ?>.<br/>
            Ce site vous permettra de mettre "en vitrine" les objets que vous voulez échangez avec d'autres personnes. <br/>
            Toutes ces personnes travaillent au CESI de Mont-Saint-Aignan. Si l'objet mis en vitrine par une autre personne vous intéresse, vous trouverez des informations pour la contacter dans son profil.<br/>
            Bonne journée.
            <?php }
            else
            { ?>
             Bienvenue sur le site d'échange du CESI <br/>
             Ce site vous permettra de mettre "en vitrine" les objets que vous voulez échangez avec d'autres personnes. <br/>
             Toutes ces personnes travaillent au CESI de Mont-Saint-Aignan. Si l'objet mis en vitrine par une autre personne vous intéresse, vous trouverez des informations pour la contacter dans son profil. <br/> 
             Pour accéder aux services du site, une inscription est requise. <br />
             Pour s'inscrire, <a class="lien" href="http://localhost/ProjetCESI/inscription.php"> cliquez-ici </a>.<br/>
             Bonne journée! 

            <?php
            } 
            ?>            
        </div>    

         <script src="lib/js/jquery.min.js"></script>
        <script src="lib/js/popper.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
    </body>

    <footer>
    </footer>
</html>