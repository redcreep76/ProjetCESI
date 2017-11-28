<?php 
session_start();
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
        <link rel="stylesheet" href="css/remerciement.css">

        <title> Le Bon Cesi - Merci </title>
	</head>

	<body>
		 <?php
    	 include('sql/database.php');
    	 include('inc/header.php');
         ?>
         <div class ="container col-8-xs col-md-8 col-lg-8 text-center taille">
         	
         	<div class="col-xs-offset-2 col-12-xs col-md-12 col-lg-12 ">
         	<p class="borders">Merci de vous êtes inscrit <?php echo $_SESSION['prenom']; ?>! N'attendez plus ,<a href="http://localhost/ProjetCESI/connexion.php" class ="fotext">connectez-vous</a> et profitez de tous les avantages que ce site vous offre.<br/> Bonne journée! </p>	
         	</div>
        </div> 		







        <script src="lib/js/jquery.min.js"></script>
        <script src="lib/js/popper.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
    </body>

    <footer>
    </footer>
</html>