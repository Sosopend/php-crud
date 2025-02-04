<!DOCTYPE html>
<html lang="fr">
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
        //var_dump($_POST["id"]);
        $userId = $_POST["id" ];
        $requetefind = "SELECT * FROM users WHERE id = $userId";
        $exec = $conn->query($requetefind);
        $result = $exec->fetch(PDO::FETCH_ASSOC);

        //var_dump($result);

    if($exec): 
?>

<form action="./modifier.php" method="post">
    <input type="text" name="nom" value="<?php echo $result["lastname"]?>">
    <input type="text" name="prenom" value="<?php echo $result["firstname"]?>">
    <input type="email" name="email" value="<?php echo $result["email"] ?>">
    <input type="text" name="password" value="<?php echo $result["password"]?>">
    <input type="hidden" name="id" value="<?php echo $userId?>">
    <input type="submit" value="Modifier">
</form>
<?php endif; ?>
</body>
</html>