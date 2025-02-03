<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <?php require_once("../../dbconnect.php");
    if ($conn): ?>
        <h1>Connexion à la BDD réussie !</h1>
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
    endif; 
    ?>
</body>
</html>