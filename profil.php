<?php
session_start();

if(isset($_SESSION['isconnected']))
{
    if ($_SESSION['isconnected'] == 1) 
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

            <div class="col-xs-4 col-md-4 col-lg-4  decal">
                <img class="col-12 bordure dt" src="assets/profil/<?php echo $_SESSION['coimage']; ?>" alt="Photo de profil">
                
            </div>    

            <div class="col-xs-7 col-md-7 col-lg-7  deca">
                
                    <label>Prénom : <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $_SESSION['coprenom'];?>" disabled ></label><br/>
                    <label>Nom : <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $_SESSION['conom'];?>" disabled></label><br/>
                    <label>Adresse email : <input type="email" class="form-control" name="email" id="email" value="<?php echo $_SESSION['coemail'];?>" disabled></label><br/>
                    Mot de passe : Vous seul le connaissez <br/><br/>
                    <label>Telephone : <input type="tel" class="form-control" name="telephone" id="telephone" value="<?php echo $_SESSION['cotelephone'];?>" disabled></label><br/><br/>
                    <a href="modifprofil.php"><button class="btn btn2" id="bouton">Modifier mes informations<i class="fa fa-user fa-lg" aria-hidden="true"></i></button></a>
                </form>
            </div>

        </div>    


        <script src="lib/js/jquery.min.js"></script>
        <script src="lib/js/popper.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
    </body>

    <footer>
    </footer>
    <?php } else {
        header('Location: nonconnect.php');
    }}?>
</html>