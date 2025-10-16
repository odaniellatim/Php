<?php
// Tente adicionar estas linhas no topo do SEU ARQUIVO PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'bd.php';

$nome1 = 'Daniel';
$nome2 = 'Latim';
$nomeCompleto = "$nome1 $nome2";
$caracteresNome = strlen($nomeCompleto);

// echo "Seu nome Completo é: $nomeCompleto, ele tem $caracteresNome caracteres";

$texto = 'Pera, uva, maçã e salada mista';

$palavra = "maçã";
$qntCaracteresPalavra = strlen($palavra);
$inicioPalavra = strpos($texto, $palavra);
$palavraEscolhida = substr($texto, $inicioPalavra, $qntCaracteresPalavra);


// $msg = "A posição é: $inicioPalavra </br>A palavra é:  $palavraEscolhida";

$numero1 = 30;

// Arredonda para cima ou baixo
// $msg = "Numero Arredondado: " . round($numero1); 

// Corta os decimais.
//$msg = "Numero Arredondado: " . floor($numero1); 

// Arredonda para cima
// $msg = "Numero Arredondado: " . ceil($numero1); 

$estado = $numero1 > 30;



$frutas = ["Laranja", "Pera", "Maçã", "Uva"];
// $msg = "A fruta é: " . $frutas[0];
// echo $msg;

$attackMin = $items[0]["base_status"]["min_demage"]["min"];
$attackMax = $items[0]["base_status"]["min_demage"]["max"];

print_r("Min " . $attackMin);
echo "<br>";
print_r("Max " . $attackMax);

//Pesquisar item no array
$fruta = in_array("Laranja", $frutas); // Array simples
$block = array_key_exists("level", $items[1]["requirements"]); // Array nomeado


$valorItemUserMin = 145;
$valorItemUserMax = 152;

$totalMin = $attackMin - $valorItemUserMin;
$totalMax = $attackMax - $valorItemUserMax;

echo '<fieldset>';

if ($totalMin > 0) {
    // Paragrafo com o resultado verde
    $msgMin = '<p style="color:red">Atack Minimo: ' . $totalMin . '</p>';
    //Input com valor do resultado
    // $msgMin = '<input type="text" disabled value=" ' . $totalMin . '">';
} else {
    // Paragrafo com o resultado vewrmelho
    $msgMin = '<p style="color:green">Atack Minimo: ' . $totalMin . '</p>';
}

if ($totalMax > 0) {
    // Paragrafo com o resultado verde
    $msgMax = '<p style="color:red">Atack Maximo: ' . $totalMax . '</p>';
} else {
    // Paragrafo com o resultado vewrmelho
    $msgMax = '<p style="color:green">Atack Maximo: ' . $totalMax . '</p>';
}

echo "<br>";
echo $msgMin;
echo $msgMax;

echo '</fieldset>';

$valor = null;
//Condicionais
if ($valor) {
    // $msg = "Numero maior que 30";
} else {
    // $msg = "Numero menor que 30";
}


echo "<pre>";
// var_dump($block);

// print_r($items);
echo "</pre>";
