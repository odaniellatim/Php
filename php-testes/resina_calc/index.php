<?php
require_once __DIR__ . "/functions/functions.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <main class="container">
        <h1>Resina Calc</h1>
        <section class="msg">
            <span class="msg-error">Erro: Não foi possivel realizar seu cadastro.</span>
            <span class="msg-success">Cadastro realizado com sucesso!</span>
        </section>
        <section class="container-form">
            <form action="" method="post">

                <div class="input">
                    <input type="text" name="nome-molde" placeholder="Digite o nome do molde">
                    <input type="number" name="qntd-molde" placeholder="Digite a quantidade de borracha">
                </div>

                <button>Registrar</button>
            </form>
        </section>
        <section class="container-table">
            <div class="table">
                <div class="header-table">
                    <p>Nome Molde</p>
                    <p>Borracha</p>
                    <p>Catalizador</p>
                </div>


                <div class="body-table">
                    <div class="body-line">
                        <div class="items">
                            <p><?= $nome; ?></p>
                            <p><?= $qntd; ?></p>
                            <p>3 ml</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>