<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/profil.css">
        <title> Le Bon Cesi - Mon Profil</title>
	</head>

	<body>
		<?php
            session_start();
            include('inc/functions.php');
    	    include('sql/database.php');

            if (isset($_GET['id'])) {
                $req = $pdo->prepare('SELECT ID_UTILISATEUR, UTI_NOM, UTI_PRENOM, UTI_EMAIL, UTI_TELEPHONE, UTI_IMAGE, UTI_DATE FROM T_UTILISATEUR WHERE ID_UTILISATEUR = :id');
                $req->bindParam(':id', $_GET['id']);
                $req->execute();
                $row = $req->fetch();

                if (empty($row)) {
                    header('Location: index.php');
                }

            } else {
                if (!isset($_SESSION['user'])) {
                    header('Location: index.php');
                }

                $req = $pdo->prepare('SELECT ID_UTILISATEUR, UTI_NOM, UTI_PRENOM, UTI_EMAIL, UTI_TELEPHONE, UTI_IMAGE, UTI_DATE FROM T_UTILISATEUR WHERE ID_UTILISATEUR = :id');
                $req->bindParam(':id', $_SESSION['user']);
                $req->execute();
                $row = $req->fetch();


            }
            include('inc/header.php');





        ?>

        <div class="container">
            <div class="row panel my-5">
                <div class="col-5">
                    <img class="col-12" src="assets/<?php echo (strlen($row['UTI_IMAGE']) > 0 ? 'profil/'.$row['UTI_IMAGE'] : 'img/user-icon.png');?>" alt="Photo de profil">
                </div>

                <div class="col-7">
                    <?php if ((isset($_SESSION['user'])) && ($_SESSION['user'] == $row['ID_UTILISATEUR'])) { ?>
                        <p class="h4 text-center"><b>Mes Informations:</b></p>
                    <?php } else { ?>
                        <p class="h4 text-center"><b><?php echo $row['UTI_PRENOM']." ".$row['UTI_NOM']; ?>:</b></p>
                    <?php } ?>

                    <div class="my-5">
                        <p><b class="mr-2">Nom:</b><?php echo $row['UTI_NOM']; ?></p>
                        <p><b class="mr-2">Prénom:</b><?php echo $row['UTI_PRENOM']; ?></p>
                        <p><b class="mr-2">Email:</b><?php echo $row['UTI_EMAIL']; ?></p>
                        <p><b class="mr-2">Téléphone:</b><?php echo (strlen($row['UTI_TELEPHONE']) > 0 ? $row['UTI_TELEPHONE'] : 'N/A'); ?></p>
                        <p><b class="mr-2">Date d'Inscription:</b><?php echo affDate($row['UTI_DATE']); ?></p>

                    </div>

                    <?php
                        if ((isset($_SESSION['user'])) && ($_SESSION['user'] == $row['ID_UTILISATEUR'])) { ?>
                            <div class="d-flex justify-content-around">
                                <button class="btn btn-danger">Modifier mes informations</button>
                                <button class="btn btn-danger">Modifier mon mot de passe</button>
                            </div>


                        <?php } ?>



                </div>
            </div>
        </div>

        <script src="lib/js/jquery.min.js"></script>
        <script src="lib/js/popper.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
    </body>
</html>
