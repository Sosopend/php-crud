<?php 
    var_dump($_POST);
    $userId = $_POST["id"];

    // Inclure le script de connexion à la DB
    require_once("./dbconnect.php");

    // Teste si la connexion avec PDO fonctionne :
    if($conn):?>
        <?php 
            $requete = "DELETE FROM users WHERE id = $userId";
            $exec = $conn->query($requete);

        if($exec):
        ?>
            <h1>Suppression effectuée</h1>
        <?php 
        elseif(!$exec):?>
            <h1>Erreur lors de la suppression</h1>
        <?php endif; ?>
    
<?php endif;?>