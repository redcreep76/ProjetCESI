<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="lib/css/bootstrap.min.css">
        <link rel="stylesheet" href="lib/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/index.css">
        <title>Accueil</title>
    </head>
    <body>
        <?php
            include "sql/database.php";
            $sql = file_get_contents('sql/debug.sql', FILE_USE_INCLUDE_PATH);
            $pdo->exec($sql);
        ?>
        <h1 class="text-center my-5">Jeux de données générées avec succès.</h1>
    </body>
</html>
