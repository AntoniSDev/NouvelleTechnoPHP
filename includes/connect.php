<?php    
    // constantes environnement
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASS", "");
    define("DBNAME", "tutos-php");

    // DSN de connexion

    $dsn = "mysql:dbname=" . DBNAME . ";host=" . DBHOST;

    // on va seconnecter à la base
    // try et sinon tu catch
    try{
        // instancier PDO
        $db = new PDO($dsn, DBUSER, DBPASS);

        // on s'assure d'envoyer les données en utf8
        $db->exec("SET NAMES utf8");

        //on définit le mode de fetch par défaut
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    }catch(PDOException $e) {
        die($e->getMessage());
    }

    // on est connectés à la base