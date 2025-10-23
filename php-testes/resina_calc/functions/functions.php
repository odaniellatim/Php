<?php

require_once __DIR__ . "/../class/Cadastro.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST["nome-molde"];
    $qntd = $_POST["qntd-molde"];

    $obj = new Cadastro($nome, $qntd);
}
