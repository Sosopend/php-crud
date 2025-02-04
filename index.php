
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de données users</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
<?php
    require_once("./dbconnect.php");
?>
    <div class="lecture_f">
    <h2>Liste des utilisateurs</h2>
    <div class="regroup_user">
    <?php 
        $requete = "SELECT * FROM users"; 
        $exec = $conn->query($requete);
        $result = $exec->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <hr>
    <?php foreach($result as $key => $value): ?>
        <?php //var_dump($result)?>
        <div class="user">
        <h2><?php echo $value["lastname"] . " " . $value["firstname"]; ?></h2>
        <ul>
        <li><?php echo "<strong>Email    :</strong> " . $value["email"]; ?></li>
        <li><?php echo "<strong>Password :</strong> " . $value["password"]; ?></li>
        </ul>
        <div class="div_form">
        <form action="./supprimer.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $value["id"] ?>">
                <input type="submit" class="del_user" value="Supprimer l'utilisateur">
        </form>
        <form action="./form-modifier.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $value["id"]?>">
                <input type="submit" value="Modifier l'utilisateur">
        </form>
        </div>
        </div>
    <?php 
    endforeach; 
    ?>
    </div>
    </div>
    <hr>
    <div class="ajout_f">
    <form action="./ajout.php" method="POST">
        <h2>Ajouter un utilisateur</h2>
        <div class="form-group">
        <input type="text" name="nom_user"  placeholder="Nom">
        <input type="text" name="prenom_user"  placeholder="Prénom">
        <input type="email" name="email_user" placeholder="Email">
        <input type="password" name="password_user"  placeholder="Mot de passe">
        </div>
        <input type="submit" value="Ajouter">
    </form>
    </div>

</body>

</html>