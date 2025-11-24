<?php
session_start();

$resultado = null;


/**
 * Calcula dois numeros usando um operador matematico selecionando.
 * @param float $num1 - Numero 1 para a operação.
 * @param float $num2 - Numero 2 para a operação.
 * @param string $operador - Operador matematico para realizar o calculo.
 * 
 * @return float Retorna o resultado da operação.
 */
function calc(float $num1, float $num2, string $operador)
{
    switch ($operador) {
        case "Multiplicar":
            $resultado = $num1 * $num2;
            return $resultado;
            break;
        case "Dividir":
            $resultado = $num1 / $num2;
            return $resultado;
            break;
        case "Somar":
            $resultado = $num1 + $num2;

            return $resultado;
            break;
        case "Subtrair":
            $resultado = $num1 - $num2;
            return $resultado;
            break;
        case "Porcentagem":
            $resultado = ($num1 * $num2) / 100;
            return $resultado;
            break;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero1 = htmlspecialchars($_POST['valor1']);
    $numero2 = htmlspecialchars($_POST['valor2']);
    $operacao = $_POST['calc'];


    if (empty($numero1) && empty($numero2)) {
        print "Preencha os campos com um valor.";
    } else {

        $Multiplicar = $_POST['calc'] === "Multiplicar" ? "checked" : "";
        $Dividir = $_POST['calc'] === "Dividir" ? "checked" : "";
        $Somar = $_POST['calc'] === "Somar" ? "checked" : "";
        $Subtrair = $_POST['calc'] === "Subtrair" ? "checked" : "";
        $Porcentagem = $_POST['calc'] === "Porcentagem" ? "checked" : "";

        if (!empty($operacao)) {
            if ($numero1 === "0") {
                print "Impossivel realizar essa operação $numero1 por $numero2";
            } else {
                $resultado = calc($numero1, $numero2, $_POST['calc']);
                $total = "Resultado: $resultado";

                $data = [
                    "id" => rand(0, 1000),
                    "numero 1" => $numero1,
                    "numero 2" => $numero2,
                    "resultado" => $resultado,
                ];
                $sse = isset($_SESSION['backup']) ? $_SESSION['backup'] : [];
                $sse[] = $data;

                $_SESSION['backup'] = $sse;

                $dataJson = json_encode($sse, JSON_PRETTY_PRINT);
                fnData($dataJson);
            }
        } else {
           print "Selecione um operador matematico.";
        }
    }
}

function fnData($info)
{
    $pasta = __DIR__ . "/dados";
    $arquivo = "data.json";

    // Cria o diretório do banco de dados
    !file_exists($pasta) ? mkdir($pasta, 0777) : "";

    //Cria o arquivo e escreve os dados nesse arquivo.
    $json = fopen($pasta . "/" . $arquivo, "w");
    fwrite($json, $info);
    fclose($json);
}

// Pega os dados do arquivo json
function getData()
{
    $pasta = __DIR__ . "/dados";
    $arquivo = $pasta . "/data.json";
    $data = [];

    if (file_exists($pasta)) {

        if (file_exists($arquivo)) {

            //Leitura do dados do arquivo.
            $conteudo = file_get_contents($arquivo);
            $dataJson = json_decode($conteudo, true);

            if ($dataJson === null) {
                // print "Error decoding JSON: " . json_last_error_msg();
                return false;
            } else {

                foreach ($dataJson as $dt) {

                    $arrayItens = [
                        "id" => $dt["id"],
                        "numero 1" => $dt['numero 1'],
                        "numero 2" => $dt['numero 2'],
                        "resultado" =>
                        $dt['resultado']
                    ];

                    array_push($data, $arrayItens);
                }
            }
        } else {
            print "Arquivo não existe";
            return $msg;
        }
    } else {
        print "Pasta não existe";
        return $msg;
    }
    return $data;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="../bootstrap/bootstrap.min.css" rel="stylesheet" /> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <title>Software para Testes</title>
</head>

<body>
    <div class="container mt-6 min-width ">

        <h1 class="h1 mt-4">Calculadora com php</h1>

        <!-- Warning: mensagem de alerta para algum erro-->
        <?php if ($msg ?? ""): ?>
            <div class=" rounded-2 p-2 mb-2 bg-warning-subtle border border-2 border-warning align-items-center">
                <span class="text-center fw-bold"><?= $msg; ?></span>
            </div>
        <?php endif; ?>
        <!-- Form: Campos dos formularios que precisam ser preenchidos para realizar os calculos.-->
        <div class="container-sm border border-primary rounded-2 p-3 ">
            <form action="" name="calc" method="post" class=" ">

                <div class="row pt-2 pb-2 rounded-2 g-2">
                    <div class="col-12 col-md-6 mb-2 mt-2 form-floating">
                        <input class="form-control w-100 " type="number" name="valor1" placeholder="Digite um numero" value="<?= $numero1 ?? "" ?>" />
                        <label for="valor1">Numero 1</label>
                    </div>
                    <div class="col-12 col-md-6 mt-2 form-floating g-2">
                        <input class="form-control w-100" type="number" name="valor2" placeholder="Digite um numero" value="<?= $numero2 ?? "" ?>">
                        <label for="valor2">Numero 2</label>
                    </div>
                </div>

                <div class="row mt-2 pt-2 pb-2 rounded-2">
                    <div class="col-md col-4 text-center mb-2 d-flex flex-column align-items-center justify-content-center gap-2">
                        <Input class="form-check-input p-2" type="radio" name="calc" value="Multiplicar" <?= $Multiplicar ?? ""; ?> />
                        <i class="bi bi-asterisk" style="font-size:25px;"></i>
                    </div>
                    <div class="col-md col-4 text-center mb-2 d-flex flex-column align-items-center justify-content-center gap-2">
                        <Input class="form-check-input p-2" type="radio" name="calc" value="Dividir" <?= $Dividir ?? ""; ?> />
                        <i class="bi bi-vr" style="font-size:25px;"></i>
                    </div>

                    <div class="col-md col-4 text-center mb-2 d-flex flex-column align-items-center justify-content-center gap-2">
                        <Input class="form-check-input p-2" type="radio" name="calc" value="Somar" <?= $Somar ?? ""; ?> />
                        <i class="bi bi-plus-square-fill" style="font-size:25px;"></i>
                    </div>
                    <div class="col-md col-4  text-center mb-2 d-flex flex-column align-items-center justify-content-center gap-2">
                        <Input class="form-check-input p-2" type="radio" name="calc" value="Subtrair" <?= $Subtrair ?? ""; ?> />
                        <i class="bi bi-dash-square-fill" style="font-size:25px;"></i>
                    </div>
                    <div class="col-md col-4  text-center mb-2 d-flex flex-column align-items-center justify-content-center gap-2">
                        <Input class="form-check-input p-2" type="radio" name="calc" value="Porcentagem" <?= $Porcentagem ?? ""; ?> />
                        <i class="bi bi-percent" style="font-size:25px;"></i>


                    </div>
                </div>

                <button class="btn btn-primary btn-lg mt-4" name="ativar">Calcular</button>
            </form>
        </div>

        <?php if ($resultado >= 0 && $resultado != null) : ?>
            <div class=" rounded-2 mt-4 p-2 bg-primary-subtle border border border-primary text-center">
                <span class="fs-3 fw-bold">
                    <?= $total ?? "" ?>
                </span>
            </div>
        <?php elseif ($resultado <= -1 && $resultado != null) : ?>
            <div class=" rounded-2 mt-4 p-2 bg-danger-subtle border border border-danger text-center">
                <span class="fs-3 fw-bold">
                    <?= $total ?? "" ?>
                </span>
            </div>
        <?php endif; ?>
    </div>

    <p class="h4 fw-bold mt-3 text-center">Resultados Anteriores</p>
    <div class="container bg-light">


        <?php
        $fnGetData = getData();
        if($fnGetData){
            $ss = array_reverse($fnGetData);
        }
        
        ?>
        <div class="row g-2 row-cols-2">
        <!-- Verifica se o array (Sessão tem dados) se não aprensenta mensagem de nenhum item cadastrado.-->
            <?php if($ss ?? ""): ?>

            <?php foreach ($ss as $calculos) : ?>
                <?php if ($calculos['resultado'] >= 0) : ?>

                    <!-- Info: mensagem de com o resultado da formula realizada-->
                    <div class="col-12 col-md-3  ">
                        <div class="p-3 rounded-2 bg-primary-subtle border border border-primary">
                            <div class="row">
                                <div class="col-12"><?= "ID: <strong>" . $calculos['id'] . "</strong>"; ?></div>
                                <div class="col-12"><?= "Numero 1: <strong>" . $calculos['numero 1'] . "</strong> "; ?></div>
                                <div class="col-12"><?= "Numero 2: <strong>" . $calculos['numero 2'] . "</strong> "; ?></div>
                                <div class="col-12"><?= "Resultado: <strong>" . $calculos['resultado'] . " </strong>"  ?? ""; ?></div>
                            </div>

                        </div>
                    </div>
                <?php elseif ($calculos['resultado'] < 0): ?>

                    <div class="col-12 col-md-3  ">
                        <div class="p-3 fs-6 fw-bold rounded-2 bg-danger-subtle border border border-danger">
                            <div class="row">
                                <div class="col-12"><?= "ID: <strong>" . $calculos['id'] . "</strong>"; ?></div>
                                <div class="col-12"><?= "Numero 1: <strong>" . $calculos['numero 1'] . "</strong> "; ?></div>
                                <div class="col-12"><?= "Numero 2: <strong>" . $calculos['numero 2'] . "</strong> "; ?></div>
                                <div class="col-12"><?= "Resultado: <strong>" . $calculos['resultado'] . " </strong>"  ?? ""; ?></div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>

            <?php else: ?>
                <div class="col-12 text-center mt-4">
                        <div class="p-3 fs-6 fw-bold rounded-2 bg-warning-subtle border border border-warning">
                            <div class="row">
                                <div class="col-12"><?= "Nenhuma formula cadastrada."; ?></div>
                                
                            </div>
                        </div>
                </div>  
            
            <?php endif; ?>
        </div>
    </div>

</body>

</html>