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

        $dadosUser = [
            "nome" => $nome,
            "idade" => $idade,
            "sexo" => $sexo,
            "salario" => $salario,
            "status-emprego" => $statusEmprego,
            "profissao" => $profissao,
        ];

        //cria a sessão onde estão os dados armazenados no servidor.
        startSessao("dadosUser", $dadosUser);

        return $dadosUser;
    } else {

        return [
            "msg" => "Nenhum usuario cadastrado.",
        ];
    }
}

function criarCookie($nomeCookie, $dados)
{
    return setcookie($nomeCookie, json_encode($dados));
}

/**
 * Cria sessão e armazena os dados cadastrados do usuario.
 * 
 * @param string $nomeSessao Nome que vai ser usado para referenciar a sessão
 * @param array $dados Array de items que devem ser armazenados na sessao.
 */
function startSessao(string $nomeSessao, array $dados): array
{
    //Cria a Sessão e Cookies com os dados do usuario.
    $CriaSessao = $_SESSION[$nomeSessao] = $dados;
    return $CriaSessao;
}

function veficaMetodoServerEnviado()
{
    if (!isset($_SESSION['dadosUser'])) {
        $CriaSessao = ["msg" => "Nenhum usuario cadastrado."];
        return $CriaSessao;
    } elseif (!empty($_SESSION['dadosUser'])) {
        $CriaSessao = $_SESSION["dadosUser"];
        return $CriaSessao;
    } else {
        $CriaSessao = "Sessão sem dados para apresentar.";
        return $CriaSessao;
    }
}

function bd($dados)
{
    $fileName = "myBD.json";
    $folder = "banco_dados";
    $permisao_folder = 644;
    // $diretorio_bd = getcwd();

    // print_r($diretorio_bd);
    if (!is_dir($folder)) {
        mkdir($folder, $permisao_folder);
    }



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //modo leitura se o arquivo já existir


        $localBD = $folder . "/" . $fileName;
        $arquivo = fopen($fileName, "w+");

        if (!$arquivo) {
            echo "Criando arquvio!";
            // fopen($fileName, "a");
            // fwrite($fileName, $dados);
            // fclose($fileName);
        } else {
            echo "Arquivo já criado e existe";
            // fopen($fileName, "a");
            // fwrite($fileName, $dados);
            // fclose($fileName);
        }





        return $fileName . "Cadastro realizado com sucesso";
    } elseif (file_exists($fileName)) {
        $bd = file_get_contents($fileName);
        $json = json_decode($dados);
        return $json;
    }
}
