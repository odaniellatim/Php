<?php

// $nome = 'João Silva';
// $idade = 35;
// $sexo = 'Masculino';
// $salario_mensal = 2210.30;
// $estaEmpregado = true;
// $habilidades = ['PHP', 'Javascript', 'HTML', 'CSS'];


// $statusEmprego = match (true) {
//     true => 'Empregado',
//     false => 'Desempregado'
// };

/**
 * Calcula o valor do salario anual.
 * 
 * @param float $salario Valor do salario mensal.
 * 
 * @return string Total do valor ganho anualmente.
 */
function salarioAnual(float $salario): string
{
    $tercoDeFerias = $salario / 3;
    $salarioAnual = ($salario * 12) + $tercoDeFerias;

    return conversorMoeda($salarioAnual);
}

/**
 * Calcula o tempo que falta para o usuario se aposentar.
 * 
 * @param int $idade Idade do usuario.
 * @param string $sexo Sexo do usuario.
 * 
 * @return int Tempo que falta para o usuario se aposentar.
 */
function anosParaAposentar(int $idade, string $sexo): int
{
    $faltaAposentar = null;
    $anos_para_aposentar = match ($sexo) {
        'Masculino', 'masculino' => APOSENTADORIA_MASCULINA,
        'Feminino', 'feminino' => APOSENTADORIA_FEMININA
    };

    $faltaAposentar = $anos_para_aposentar - $idade;
    return $faltaAposentar;
}

/**
 * Converte um valor em moeda BR
 * 
 * @param float $valor Valor que vai ser convertido em dinheiro.
 * 
 * @return string retorna o valor convertido em moeda BR.
 */
function conversorMoeda(float $valor): string
{
    $moedaBR = 'R$ ' . number_format($valor, 2, ",", ".");
    return $moedaBR;
}

/**
 * Cadastro de usuarios passando dados via GET
 * 
 * @return array Retonar os dados passados via GET.
 * 
 */
function cadastroUsuarios(): array
{
    if (!empty($_POST['nome']) && !empty($_POST['idade']) && !empty($_POST['sexo']) && !empty($_POST['salario']) && !empty($_POST['emprego']) && !empty($_POST['profissao'])) {

        $nome = $_POST['nome'];
        $idade = $_POST['idade'];
        $sexo = $_POST['sexo'];
        $salario = $_POST['salario'];
        $statusEmprego = $_POST['emprego'];
        $profissao = $_POST['profissao'];

        return [
            "nome" => $nome,
            "idade" => $idade,
            "sexo" => $sexo,
            "salario" => $salario,
            "status-emprego" => $statusEmprego,
            "profissao" => $profissao,
        ];
    } else {

        return [
            "msg" => "Nenhum usuario cadastrado.",
        ];
    }
}

function criarCookie($nomeCookie, $dados)
{
    return setcookie($nomeCookie, json_encode($dados), time() + 300);
}

/**
 * Cria sessão e armazena os dados cadastrados do usuario.
 * 
 * @param string $nomeSessao Nome que vai ser usado para referenciar a sessão
 * @param array $dados Array de items que devem ser armazenados na sessao.
 */
function startSessao(string $nomeSessao, array $dados): array
{
    return $_SESSION[$nomeSessao] = $dados;
}

function veficaMetodoServerEnviado($dadosUsuario)
{
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // criarCookie("dadosUser", $dadosUsuario);
        $CriaSessao = startSessao("dadosUser", $dadosUsuario);
    } elseif (!empty($_SESSION['dadosUser'])) {

        echo "<pre>";
        $CriaSessao = $_SESSION["dadosUser"];
        // var_dump($dadosUsuario);
        echo "</pre>";
    } else {

        $CriaSessao = "Sessão sem dados para apresentar.";
        // var_dump($_SESSION);
    }

    return $CriaSessao;
}
