<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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
    // on peut récuperer la liste des users   
    $sql = "SELECT * FROM users";

    // on execute la requête

   $requete = $db->query($sql);

   // var_dump($requete);

    // on recupére les données (fetch ou fetchall)
    $user = $requete -> fetchAll();
    
    echo "<pre>";
    var_dump($user);
    echo "</pre>";

    // ajouter un utilisateur
    $sql = "INSERT INTO users (email, pass) VALUES ('vouvou@lol.cou', 'azerty')";

    $requete = $db->query($sql);

    // modifier un utilisateur 
    $sql ="UPDATE users SET pass = 'kikoololmdr' WHERE id = 2";

    $requete = $db->query($sql);


    //supprimer utilisateur
    $sql = "DELETE FROM users WHERE id > 3";

    $requete = $db->query($sql);

   
    



   
         
    ?>  

</body>
</html>