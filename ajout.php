<?php
    require_once("dbconnect.php");

?>
<?php

$nom = $_POST["nom_user"];
$prenom = $_POST["prenom_user"];
$email = $_POST["email_user"];
$password = $_POST["password_user"];

if($conn): ?>
    <h1>Connection à la BDD réussie</h1>

    <?php // Requete d'ajout d'un produit
    $requete = "INSERT INTO users (firstname, lastname, email, password) VALUES ('$nom', '$prenom', '$email', '$password')";
    // executer et stocker  la requête
    $exec = $conn->query($requete);
    if($exec): ?>
        <h2>Utilisateur ajouté avec succès</h2>
    <?php else: ?>
        <h2>Erreur lors de l'ajout de l'utilisateur</h2>
        window.location.replace("http://cours-php.test/connex-bdd/");

    <?php endif; ?>

<?php else: ?>
    <h1>Connection à la BDD échouée</h1>
<?php endif; ?>
