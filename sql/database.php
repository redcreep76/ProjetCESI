<?php

    //Adresse du serveur MySQL.
    $host = "localhost";
    //Nom d'utilisateur du serveur MySQL.
    $user = "root";
    //Mot de pase du serveur MySQL.
    $password = "";
    //Nom de la base de données.
    $dbname = "leboncoin";

    try {
        //Connection au serveur MySQL
        $pdo_options[PDO::MYSQL_ATTR_INIT_COMMAND] = "SET NAMES utf8";
        $pdo = new PDO('mysql:host='.$host, $user, $password, $pdo_options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        //Création de la base de données.
        $pdo->exec("CREATE DATABASE IF NOT EXISTS ".$dbname. " CHARACTER SET utf8 COLLATE utf8_bin");
        $pdo->exec("USE ".$dbname);

        //Création des tables de données.
        $sql = file_get_contents('init.sql', FILE_USE_INCLUDE_PATH);
        $pdo->exec($sql);
    } catch (PDOException $e) {
        die($e->getMessage());
    }
?>
