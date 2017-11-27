<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/ajout.css">
        <title>Accueil</title>
    </head>
    <body>
        <?php include("./sql/database.php"); ?>

        <?php include("./inc/header.php"); ?>

        <div class="container">
            <div class="panel row justify-content-center col-12">
                <div class="col-12">
                    <h3>Ajouter un article</h3>
                </div>

                <form class="col-8">
                    <div class="form-group row">
                        <label class="col-3 col-form-label" for="name">Titre de l'article</label>
                        <div class="col-8">
                            <input class="form-control" type="text" id="name" />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 col-form-label" for="name">Titre de l'article</label>
                        <div class="col-3">
                            <div class="input-group">
                                <input class="form-control price" aria-required="true" pattern="^[1-9][0-9]{0,4}(\.[0-9]{1,2})?$" type="text" id="name" />
                                <span class="input-group-addon"><i class="fa fa-eur" aria-hidden="true"></i></span>
                            </div>
                        </div>

                    </div>





                    <div class="form-group row">
                        <label class="col-3" for="name">Titre de l'article</label>
                        <div class="col-5">
                            <select class="col-12 custom-select">
                                <?php
                                    $req = $pdo->query('SELECT ID_CATEGORIE, CAT_LIBELLE FROM T_CATEGORIE');
                                    foreach ($req->fetchAll() as $row) {
                                        ?><option>
                                        <?php echo $row['CAT_LIBELLE']; ?>
                                        </option>
                                    <?php }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3 col-form-label" for="name">Titre de l'article</label>
                        <div class="col-8">
                            <textarea class="form-control" rows="9"></textarea>
                        </div>
                    </div>

                </form>




            </div>

        </div>

        <script src="lib/js/jquery.min.js"></script>
        <script src="lib/js/popper.min.js"></script>
        <script src="lib/js/bootstrap.min.js"></script>
        <script src="js/ajout.js"></script>
    </body>
</html>
