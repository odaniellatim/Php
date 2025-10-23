<?php
require_once "../functions/constants.php";
require_once "../functions/dados.php";

session_start();
$dadosSessao = veficaMetodoServerEnviado();

//Processo para criar um arquivo json
// $json = json_encode($dadosSessao);
// print_r($json);

// bd($json);

// var_dump($dadosSessao);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Explorando Variaveis em PHP</title>
    <link rel="stylesheet" href="../style.css">
</head>