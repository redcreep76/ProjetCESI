<?php
session_start();
$_SESSION['isconnected'] = 0 ;
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
        <link rel="stylesheet" href="css/connexion.css">

        <title> Le Bon Cesi - Merci </title>
	</head>

	<body>
		 <?php
    	 include('sql/database.php');
    	 include('inc/header.php');
         ?>


          <div class ="container col-10-xs col-md-7 col-lg-5 text-center taille">
            <div class ="col-12 yolo">
            Connectez-vous 
            <br/>
          
            </div> 
            <br/>
            <span class="messageerreur"><?php if(isset($_SESSION['failco'])){ echo $_SESSION['failco'];echo '<br>' ; } ?></span>
            
           <form action="traitementconnexion.php" method="post">
            
           <label for="email">Adresse mail: &nbsp&nbsp<input type="email" placeholder="Adresse email" name="email" id="email"></label>
           <label for="pass">Mot de passe: &nbsp&nbsp<input type="password" placeholder="******" name="pass" id="pass"></label> <br/><br/>
           <input type="submit" value="Se connecter" name="connecter" id="connexion"><br/><br/>
           <a href="http://localhost/ProjetCESI/inscription.php" class="petit">Je n'ai pas de compte</a> &nbsp&nbsp&nbsp&nbsp&nbsp <span class="petit">Mot de passe oublié ? </span>
          </div> 

          <?php
            unset($_SESSION['failco']);
          ?>
        <script src="lib/js/jquery.min.js"></script>
        <script src="lib/js/popper.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
    </body>

    <footer>
    </footer>
</html>