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

    //var_dump($_POST);

    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $userId = $_POST["id"];

    require_once("./dbconnect.php");
    
    if ($conn):

        $requete = "UPDATE users SET lastname = '$nom', firstname = '$prenom', email = '$email', password = '$pass' WHERE id = $userId";
        //var_dump($requete);

        $exec = $conn->query($requete);
        header("Refresh: 5; URL=http://cours-php.test/connex-bdd/users/php-crud/");
    endif;
    ?>
</body>

</html>