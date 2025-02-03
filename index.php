<?php
    require_once("dbconnect.php");

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <h2>Lecture de la BDD des users</h2>
    <?php 
        $requete = "SELECT * FROM users"; 
        $exec = $conn->query($requete);
        $result = $exec->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <hr>
    <?php foreach($result as $key => $value): ?>
        <p><?php echo $value["lastname"] . " " . $value["firstname"]; ?></p>
        <ul>
        <li><?php echo $value["email"]; ?></li>
        <li><?php echo $value["password"]; ?></li>
        </ul>
        <hr>
    <?php 
    endforeach; 
    ?>

    <form action="./ajout.php" method="post">
        <h2>Ajouter un utilisateur</h2>
        <input type="text" name="nom_user"  placeholder="Nom">
        <input type="text" name="prenom_user"  placeholder="Prénom">
        <input type="text" name="email_user"  placeholder="Email">
        <input type="text" name="password_user"  placeholder="Mot de passe">
        <input type="submit" value="Ajouter">
    </form>
    <form action="./supprimer.php" method="post">
        <h2>Supprimer un utilisateur</h2>
        <input type="number" name="id"  placeholder="id">
        <input type="submit" value="Supprimer">
    </form>
</body>
</html>