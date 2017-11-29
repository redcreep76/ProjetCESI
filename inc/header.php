
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


<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-faded" id="navbar">
    <a class="navbar-brand" href="#"><i class="fa fa-home fa-lg" aria-hidden="true"></i>   Accueil</a>
    <div class="d-flex flex-row order-2 align-items-center order-lg-3">
        <ul class="navbar-nav flex-row align-items-center mr-4 mr-lg-0">
            <?php if((isset($_SESSION['isconnected'])) && ($_SESSION['isconnected'] == 1)) { ?>
                <li class="nav-item">
                    <a class="nav-link"><button class="btn btn-primary"><i class="fa fa-sign-in fa-3x logo_user" aria-hidden="true"></i></button></a>
                </li>
            <?php } else { ?>
                <li class="nav-item">
                    <a class="nav-link">
                        <div class="d-block d-lg-none mx-2">
                            <button class="btn btn-light text-dark rounded-circle"><i class="fa fa-user fa-lg" aria-hidden="true"></i></button>
                        </div>
                        <div class="d-none d-lg-block">
                            <button class="btn btn-light text-dark"><i class="fa fa-user fa-lg mr-2" aria-hidden="true"></i>Inscription</button>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link">
                        <div class="d-block d-lg-none mx-2">
                            <button class="btn btn-light text-dark rounded-circle"><i class="fa fa-sign-in fa-lg" aria-hidden="true"></i></button>
                        </div>
                        <div class="d-none d-lg-block">
                            <button class="btn btn-light text-dark"><i class="fa fa-sign-in fa-lg mr-2" aria-hidden="true"></i>Connection</button>
                        </div>
                    </a>
                </li>

            <?php } ?>
        </ul>
        <button class="navbar-toggler py-2 px-3 my-2 border-white" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars fa-lg"></i>
            <!--<span class="navbar-toggler-icon bg-white"></span>-->

        </button>
    </div>





    <div class="collapse navbar-collapse order-3 order-lg-2" id="navbarToggler">
        <ul class="navbar-nav pb-3 pb-lg-0">
            <?php
                foreach ($pdo->query('SELECT ID_CATEGORIE, CAT_LIBELLE FROM T_CATEGORIE ORDER BY ID_CATEGORIE ASC')->fetchAll() as $row) { ?>
                <li class="nav-item pt-1">
                    <a class="nav-link py-1 py-lg-0 px-3" href="#"><span class="navbar-text py-0 px-1"><?php echo $row['CAT_LIBELLE']; ?></span></a>
                </li>
            <?php } ?>
        </ul>

      </div>




  </nav>
