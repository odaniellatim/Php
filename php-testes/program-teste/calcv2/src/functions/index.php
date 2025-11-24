<?php
session_start();

include_once("../calcv2/src/class/Calculadora.php");
include_once("../calcv2/src/class/Alerta.php");
include_once("../calcv2/src/class/Log.php");
include_once("../calcv2/src/class/Historico.php");

$erro = null;
$sucesso = null;
$mensagem = new Alerta();
$logUser = new Log();
$newCalculo = new Historico();

if (!empty($_SERVER["REQUEST_METHOD"] == "POST")) {
    $titulo = $_POST['descricao'];
    $numero1 = $_POST['numero1'];
    $numero2 = $_POST['numero2'];
    $operacao = $_POST['operacao'];

    if (!empty($titulo) && !empty($numero1) && !empty($numero2) && !empty($operacao)) {

        $id = rand(1, 1000);
        $calc = new Calculadora($id, $titulo, $numero1, $numero2, $operacao);
        $resultado = $calc->operacao();


        $_SESSION["data"][] = [
            "id" => $id,
            "titulo" => $titulo,
            "numero1" => $numero1,
            "numero2" => $numero2,
            "operacao" => $operacao,
            "resultado" => $resultado
        ];

        $sucesso = $mensagem->sucess("Cadastro Realizado com sucesso.");

        $logUser->log($sucesso, false);

        // $newCalculo->addCalculos($calc);
        // print_r($newCalculo);
    } else {

        $erro = $mensagem->error("Preencha os campos corretamente.");

        $logUser->log($erro, true);
    }

    // Processo para remover um item da lista
    if (!$_SERVER['REQUEST_METHOD'] == "GET") {
        echo "método Get Ativado";
        $id = $_GET['remover'];

        $newCalculo->removerCalculo($calc);
        $_SESSION["data"] = $newCalculo;
        print_r($_SESSION["data"]);

        if (is_int($id)) {
            $newCalculo->removerCalculo($calc);
            $_SESSION["data"] = $newCalculo;
            print_r($newCalculo);
        } else {

            $erro = $mensagem->error("Não foi possivel encontrar o ID informado.");
            $logUser->log($erro, true);
        }
    }
}
// var_dump(count($_SESSION['data']));
// var_dump($_SESSION['data']);