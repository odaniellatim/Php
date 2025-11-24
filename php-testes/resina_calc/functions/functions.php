<?php

require_once __DIR__ . "/../class/Cadastro.php";
require_once __DIR__ . "/../class/Banco.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome-molde"];
    $qntd = $_POST["qntd-molde"];

    $obj = new Cadastro($nome, $qntd);
    $bd = new Banco();
    $bd->gravarDados($obj);

    // echo "<pre>";
    // print_r($bd);
    // echo "</pre>";
}
