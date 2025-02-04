<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    
<?php 
    // Inclure le script de connexion à la DB
    require_once("./dbconnect.php");

    $userId = $_POST["id"];
    // Teste si la connexion avec PDO fonctionne :
    if($conn):?>
        <?php 
            $requete = "DELETE FROM users WHERE id = $userId";
            $exec = $conn->query($requete);

        if($exec):
        ?>
            <h1>Suppression effectuée</h1>
            <?php header("Refresh: 5; URL=http://cours-php.test/connex-bdd/users/php-crud/"); 
        exit; ?>
        <?php 
        elseif(!$exec):?>
            <h1>Erreur lors de la suppression</h1>
            <?php header("Refresh: 5; URL=http://cours-php.test/connex-bdd/users/php-crud/");
            exit; ?>
        <?php endif; ?>
    
<?php endif;?>

</body>
</html>  