
<header class="container-fluid" id="header">
    <div class="row">


    <div class="col-3">
        <img src="assets/img/logo.png" alt="logo" />
    </div>

    <div class="offset-1 col-4 d-flex align-items-center">
        <h1>Le bon coin du CESI</h1>
    </div>



    <!--<div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
        <div class="form-group input-group">
            <input type="text" class="form-control" name="search"  placeholder="Recherchez..."/>
            <span class="input-group-addon"><i class="fa fa-search fa" aria-hidden="true"></i></span>
        </div>
    </div>-->
    </div>
</header>


<nav class="navbar justify-content-start sticky-top navbar-expand-lg navbar-light bg-faded px-lg-5" id="navbar">


    <button class="navbar-toggler py-2 px-3 my-2 mr-4 border-white" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars fa-lg"></i>
        <!--<span class="navbar-toggler-icon bg-white"></span>-->

    </button>
    <a class="navbar-brand justify-self-start" href="#"><i class="fa fa-home fa-lg mr-2" aria-hidden="true"></i>Accueil</a>

    <div class="ml-auto d-flex flex-row order-2 align-items-center order-lg-3">
        <div class="dropdown">
            <?php if (isset($_SESSION['user'])) {
                $query = $pdo->prepare('SELECT ID_UTILISATEUR, UTI_NOM, UTI_PRENOM, UTI_IMAGE FROM T_UTILISATEUR WHERE ID_UTILISATEUR = :id');
                $query->bindParam(':id', $_SESSION['user']);
                $query->execute();
                $res = $query->fetch();
            ?>
                <button class="btn btn-light dropdown-toggle d-flex align-items-center pl-0 py-0" type="button" id="dropdownUserButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <img src="assets/<?php echo (strlen($res['UTI_IMAGE']) > 0 ? 'profil/'.$res['UTI_IMAGE'] : 'img/user-icon.png');?>" class="bg-white rounded user-icon" />

                    <span class="ml-3 mr-2"><?php echo $res['UTI_PRENOM']; ?> <?php echo $res['UTI_NOM']; ?></span>
                </button>

                <div class="dropdown-menu" aria-labelledby="dropdownUserButton">
                    <a class="dropdown-item" href="#">Publier une annonce</a>
                    <a class="dropdown-item" href="profil.php">Mon profil</a>
                    <a class="dropdown-item" href="#">Mon historique</a>
                    <a class="dropdown-item" href="deconnection.php">Se déconnecter</a>
                </div>

            <?php } else { ?>
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownLoginButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">


                  <i class="fa fa-user fa-lg mr-2" aria-hidden="true"></i>Connexion
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownLoginButton">
                    <a class="dropdown-item" href="inscription.php">S'inscrire</a>
                    <a class="dropdown-item" href="connexion.php">Se connecter</a>
                </div>
            <?php } ?>
        </div>
    </div>





    <div class="collapse navbar-collapse order-3 order-lg-2" id="navbarToggler">
        <ul class="navbar-nav pb-3 pb-lg-0">
            <?php
                foreach ($pdo->query('SELECT ID_CATEGORIE, CAT_LIBELLE FROM T_CATEGORIE ORDER BY ID_CATEGORIE ASC')->fetchAll() as $res) { ?>
                <li class="nav-item pt-1">
                    <a class="nav-link py-1 py-lg-0 px-3" href="#"><span class="navbar-text py-0 px-1"><?php echo $res['CAT_LIBELLE']; ?></span></a>
                </li>
            <?php } ?>
        </ul>

      </div>



  </nav>
