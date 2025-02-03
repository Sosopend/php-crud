<?php
    require_once("dbconnect.php");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de données users</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="lecture_f">
    <h2>Liste des utilisateurs</h2>
    <?php 
        $requete = "SELECT * FROM users"; 
        $exec = $conn->query($requete);
        $result = $exec->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <hr>
    <?php foreach($result as $key => $value): ?>
        <div class="user">
        <h2><?php echo $value["lastname"] . " " . $value["firstname"]; ?></h2>
        <ul>
        <li><?php echo "email    : " . $value["email"]; ?></li>
        <li><?php echo "password : " . $value["password"]; ?></li>
        <form action="./supprimer.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $value["id"] ?>">
                <input type="submit" class="del_user" value="Supprimer l'utilisateur">
            </form>
        </ul>
        </div>
    <?php 
    endforeach; 
    ?>
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