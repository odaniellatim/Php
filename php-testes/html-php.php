<?php

include "dados.php";

$nome = 'João Silva';
$idade = 35;
$sexo = 'M';
$salario_mensal = 2210.30;
$estaEmpregado = true;
$habilidades = ['PHP', 'Javascript', 'HTML', 'CSS'];

const APOSENTADORIA_MASCULINA = 65;
const APOSENTADORIA_FEMININA = 62;

//Operador Ternario
$statusEmprego = $estaEmpregado ? "Empregrado" : "Desempregado";

$anos_para_aposentar = $sexo === 'M' ? APOSENTADORIA_MASCULINA :  APOSENTADORIA_FEMININA;

$faltaAposentar = $anos_para_aposentar - $idade;


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
        <h1> Ficha Cadastral</h1>
        <p>Nome: <strong><?= $nome; ?></strong></p>
        <p>Idade: <strong><?= $idade; ?></strong></p>
        <p>Sexo: <strong><?= $sexo; ?></strong></p>
        <p>Salário Mensal:
            <strong>
                <?=
                'R$ ' . number_format($salario_mensal, 2, ",", ".");
                ?>
            </strong>
        </p>
        <p>Salário Anual:
            <strong>
                <?=
                'R$ ' . number_format(($salario_mensal * 12), 2, ",", ".");
                ?>
            </strong>
        </p>
        <p>Status de Emprego:
            <strong>
                <?=
                $statusEmprego;
                ?>
            </strong>
        </p>
        <p>Anos para Aposentadoria:
            <strong>
                <?=
                $faltaAposentar;
                ?>
            </strong>
        </p>
        <p>Habilidades:
            <strong>
                <?=
                implode(', ', $habilidades);
                ?>
            </strong>
        </p>
    </div>
</body>

</html>