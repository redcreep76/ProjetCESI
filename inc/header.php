<header class="container-fluid" id="header">
    <div class="row">


    <div class="col-3">
        <img src="assets/img/logo.png" alt="logo" />
    </div>

    <div class="offset-1 col-4 d-flex align-items-center">
        <h1>Le bon coin du CESI</h1>
    </div>

    <div class="offset-1 col-3">
        <a href="formulaire.php"><button class="btn" id="bouton">S'enregistrer <i class="fa fa-sign-in fa-lg logo_user" aria-hidden="true"></i></button></a>
        <a href="panier.php"><button class="btn" id="bouton">Se connecter <i class="fa fa-user fa-lg" aria-hidden="true"></i></button></a>
    </div>
    <!--<div class="col-lg-6 col-lg-offset-0 col-md-5 col-md-offset-0 col-sm-10 col-sm-offset-1 col-xs-10 col-xs-offset-1">
        <div class="form-group input-group">
            <input type="text" class="form-control" name="search"  placeholder="Recherchez..."/>
            <span class="input-group-addon"><i class="fa fa-search fa" aria-hidden="true"></i></span>
        </div>
    </div>-->
    </div>
</header>
<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-faded" id="navbar">
    <a class="navbar-brand" href="#"><i class="fa fa-home fa-lg" aria-hidden="true"></i>   Accueil</a>
    <button class="navbar-toggler my-2" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarToggler">
        <ul class="navbar-nav pb-3 pb-lg-0">
            <?php for ($i = 1; $i < 6; $i++) { ?>
                <li class="nav-item">
                    <a class="nav-link py-3 px-4" href="#">Catégorie <?php echo $i; ?></a>
                </li>
            <?php } ?>
        </ul>
      </div>
  </nav>
