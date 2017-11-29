<?php
session_start();

if(isset($_SESSION['isconnected']))
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=projetcesi;charset=utf8','root','');

    }
    catch(Exception $e)
    {
        die ('Erreur : '.$e->getMessage());
    }
    
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
        <link rel="stylesheet" href="css/profil.css">

        <title> Le Bon Cesi - Mon Profil </title>
	</head>

	<body>
		<?php
    	 include('sql/database.php');
    	 include('inc/header.php');
        ?>
        <div class="row decale col-xs-11 col-md-11 col-lg-11 ">
<form action="traitementmodif.php" method="post" enctype="multipart/form-data">
            <div class="col-xs-4 col-md-4 col-lg-4  decal ">
                <img class="col-12 bordure" src="assets/profil/<?php echo $_SESSION['coimage']; ?>" alt="Photo de profil">
                <input type="file" id="image" class="col-12 white" accept="image/*" value="assets/profil/<?php echo $_SESSION['coimage']; ?>" name="image"><br/>
                <?php if(!(empty($_SESSION['erreurimage']))) { ?> 
                        <br/><div class="alert alert-danger ecart col-10">
                            <?php echo $_SESSION['erreurimage']; ?>        
                        </div>

                    <?php } ?>
            </div>    
            <br/>
            
            <div class="col-xs-7 col-md-7 col-lg-7  deca">
                

                    <label>Prénom : <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $_SESSION['coprenom'];?>" required></label><br/>
                        
                    <?php if(!(empty($_SESSION['erreurprenom']))) { ?> 
                        <div class="alert alert-danger col-6">
                            <?php echo $_SESSION['erreurprenom']; ?>        
                        </div>

                    <?php } ?>

                    <label>Nom : <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $_SESSION['conom'];?>" required></label><br/>

                    <?php if(!(empty($_SESSION['erreurnom']))) { ?> 
                        <div class="alert alert-danger col-6">
                            <?php echo $_SESSION['erreurnom']; ?>        
                        </div>

                    <?php } ?>

                    <label>Adresse email : <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['coemail'];?>" disabled></label><br/>

                    Mot de passe : Vous seul le connaissez <br/><br/>

                    <label>Telephone : <input type="tel" class="form-control" name="telephone" id="telephone" value="<?php echo $_SESSION['cotelephone'];?>" ></label><br/>

                    <?php if(!(empty($_SESSION['erreurnom']))) { ?> 
                        <div class="alert alert-danger col-6">
                            <?php echo $_SESSION['erreurnom']; ?>        
                        </div>

                    <?php } ?>

                    <br/><a href="profil.php"><button class="btn btn2" id="bouton">Enregistrer les modifications<i class="fa fa-user fa-lg" aria-hidden="true"></i></button></a>
                
            </div> 
</form>
        </div>    
        <?php 
            unset($_SESSION['erreurprenom']); 
            unset($_SESSION['erreurnom']);
            unset($_SESSION['erreurtelephone']);
            unset($_SESSION['erreurimage']);
        ?>
    <footer>
    </footer>
    <?php } else {
        header('Location: nonconnect.php');
    }?>

        <script src="lib/js/jquery.min.js"></script>
        <script src="lib/js/popper.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
    </body>
</html>