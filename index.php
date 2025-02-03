<?php
require_once("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <div class="lecture_f">
        <h2>Lecture de la BDD des users</h2>
        <?php
        $requete = "SELECT * FROM users";
        $exec = $conn->query($requete);
        $result = $exec->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <hr>
        <?php foreach ($result as $key => $value): ?>
            <div class="user">
                <p><?php echo $value["lastname"] . " " . $value["firstname"]; ?></p>
                <ul>
                    <li><?php echo "email    : " . $value["email"]; ?></li>
                    <li><?php echo "password : " . $value["password"]; ?></li>
                    <form action="./supprimer.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $value["id"] ?>">
                        <input type="submit" value="Supprimer l'utilisateur">
                    </form>
                </ul>
            </div>
        <?php
        endforeach;
        ?>
    </div>
    <div class="ajout_f">
        <form action="./ajout.php" method="post">
            <h2>Ajouter un utilisateur</h2>
            <div class="form-group">
                <input type="text" name="nom_user" placeholder="Nom">
                <input type="text" name="prenom_user" placeholder="Prénom">
                <input type="email" name="email_user" placeholder="Email">
                <input type="password" name="password_user" placeholder="Mot de passe">
            </div>
            <input type="submit" value="Ajouter">
        </form>
    </div>

</body>

</html>