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
    require_once("./dbconnect.php");

    ?>
    <?php

    $nom = $_POST["nom_user"];
    $prenom = $_POST["prenom_user"];
    $email = $_POST["email_user"];
    $password = $_POST["password_user"];

    if ($conn): ?>
        <h1>Connection à la BDD réussie</h1>

        <?php // Requete d'ajout d'un produit
        if (!empty($_POST["nom_user"]) && !empty($_POST["prenom_user"]) && !empty($_POST["email_user"]) && !empty($_POST["password_user"])):
            $requete = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$nom', '$prenom', '$email', '$password')";
            // executer et stocker  la requête
            $exec = $conn->query($requete);
            if ($exec): ?>

                <h2>Utilisateur ajouté avec succès</h2>
                <?php header("Refresh: 5; URL=http://cours-php.test/connex-db/users/php-crud/");
                exit; ?>
            <?php else: ?>
                <h2>Erreur lors de l'ajout de l'utilisateur</h2>
                <?php header("Refresh: 5; URL=http://cours-php.test/connex-db/users/php-crud/");
                exit; ?>
            <?php endif; ?>
        <?php else: header("Refresh: 5; URL=http://cours-php.test/connex-db/users/php-crud/");
        endif; ?>
    <?php endif; ?>


</body>

</html>