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
        <link rel="stylesheet" href="css/inscription.css">
        <link rel="stylesheet" href="css/index.css">
         <script type="text/javascript" src="./js/inscription.js"></script>



        <title>Inscription - Cesi Coin</title>
    </head>

   

    <body>
    	 <?php
    	 include('sql/database.php');
    	 include('inc/header.php');
         	   
         		 ?>
    	<div class ="container col-8-xs col-md-8 col-lg-8 text-center">
    		<form method="post"  action ="traitementinscription.php" >
    			<p class ="titre text-center"><strong><span class="titreform"> Formulaire d'inscription </span></strong> </p>
		    	<div class="row text-center ">
		    			<div class="col-12-xs ">
		    			</div>
		    			
		    			
			    				<div class="col-6-xs col-md-6 col-lg-6 espace ligne">
				    	            
				                            
				    					<label for = "prenom"><strong> Prénom *: </strong></label>
				                            <p><input type="text"  name="prenom" placeholder="Ex: Valentin" id="prenom" onblur="verifPrenom(this)" value="<?php if(isset($_COOKIE['prenom'])) echo $_COOKIE['prenom']; ?>" required></p><span class="colorerreur"><?php if(!(empty($_SESSION['erreurprenom'])) ){ echo ($_SESSION['erreurprenom']);echo '<br>';}else{echo '<br>';}?></span><br/> 

				                        <label for = "nom"><strong> Nom *: </strong></label>
				                            <p><input type="text"  name="nom" placeholder="Ex: Brouillaud" id="nom"  onblur="verifNom(this)"  value="<?php if(isset($_COOKIE['nom'])) echo $_COOKIE['nom']; ?>" required></p><span class="colorerreur"> <?php if(!(empty($_SESSION['erreurnom'])) ){echo ($_SESSION['erreurnom']);echo '<br>';}else{echo '<br>';}?></span><br/>    

				                            
				    					<label for= "pass"><strong> Mot de passe *: </strong></label>
				                            <p><input type="password"  name="pass" id="pass" onblur="verifMdp(this)"  required></p><span class="colorerreur"><?php if(!(empty($_SESSION['erreurpass'])) ){echo ($_SESSION['erreurpass']);echo '<br>';}?></span><br/>
			                    </div>        

			                    <div class ="col-6-xs col-md-6 col-lg-6 espace">

			                        <label for = "verifpass"><strong> Vérification de mot de passe *: </strong></label>
			                        	<p><input type="password" name="verifpass" id="verifpass" onblur="verifVerif(this,pass)" required></p><span class="colorerreur"><?php if(!(empty($_SESSION['erreurverif'])) ){echo ($_SESSION['erreurverif']);echo '<br>';}else{echo '<br>';}?></span><br/>    

			                        <label for = "email"><strong> Adresse e-mail *: </strong></label>
			                            <p><input type="email" name="email" id="email" placeholder="adresse@viacesi.fr" onblur="verifEmail(this)" value="<?php if(isset($_COOKIE['email'])) echo $_COOKIE['email']; ?>"  required></p><span class="colorerreur"><?php if(!(empty($_SESSION['erreuremail'])) ){echo ($_SESSION['erreuremail']);echo '<br>';}else{echo '<br>';}?></span><br/>

			                        <label for = "telephone"><strong> Numéro de téléphone : </strong></label>
			                        	<p><input type="tel" name="telephone" placeholder="06 06 ** ** **" id="telephone" onblur="verifTelephone(this)" value="<?php if(isset($_COOKIE['telephone'])) echo $_COOKIE['telephone']; ?>"><span class="colorerreur"><?php if(!(empty($_SESSION['erreurtelephone'])) ){echo '<br>';echo '<br>';echo ($_SESSION['erreurtelephone']);echo '<br>';}?></span></p>
			                         
		                    	</div>
		                               
	        	</div>  
	        	<br/><br/><p class="text-center taille"><input type="checkbox"  name="cesi" id="cesi" required><label for = "cesi">&nbsp&nbsp <strong> Je certifie être un salarié appartenant au CESI.</strong></label><br/>
	        		<span class ="petit">Les champs accompagnés du symbole * sont obligatoires </span><br/><br/>
	        	<input type= "submit" class="bouton" name="valider" value="Valider" id="validation"></p>	
	        </form>		
	    </div>                	   

	    <?php 
	    	unset($_SESSION['erreurprenom']); 
	    	unset($_SESSION['erreurnom']);
	    	unset($_SESSION['erreurpass']);
	    	unset($_SESSION['erreurverif']);
	    	unset($_SESSION['erreuremail']);
	    	unset($_SESSION['erreurtelephone']);
	    ?>

    	<script src="lib/js/jquery.min.js"></script>
        <script src="lib/js/popper.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
    </body>

    <footer>
    </footer>
</html>