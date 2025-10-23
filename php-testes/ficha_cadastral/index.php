<?php
require_once "functions/constants.php";
require_once "functions/dados.php";

session_start();




?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorando Variaveis em PHP</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="box">

        <?php include_once "componentes/header.php" ?>

        <main class="content">
            <?php include_once "componentes/home.php" ?>
        </main>

        <?php include_once "componentes/footer.php" ?>


    </div>
</body>

</html>