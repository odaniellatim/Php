<h2>Ficha de Cadastro</h2>

<?php if (!isset($dadosSessao["msg"])): ?>

    <div class="card">
        <h3>Dados Usuario</h3>
        <hr>
        <p>Nome: <strong><?= $dadosSessao["nome"] ?? ""; ?></strong></p>
        <p>Idade: <strong><?= $dadosSessao["idade"] ?? ""; ?></strong></p>
        <p>Sexo: <strong><?= $dadosSessao["sexo"] ?? ""; ?></strong></p>
        <p id="salario">Salário Mensal:
            <strong>
                <?=
                conversorMoeda($dadosSessao["salario"]);
                ?>
            </strong>
        </p>
        <p>Salário Anual:
            <strong>
                <?=
                salarioAnual($dadosSessao["salario"]);
                ?>
            </strong>
        </p>
        <p>Status de Emprego:
            <strong>
                <?=
                $dadosSessao["status-emprego"];
                ?>
            </strong>
        </p>
        <p>Anos para Aposentadoria:
            <strong>
                <?=
                anosParaAposentar($dadosSessao["idade"], $dadosSessao["sexo"]);
                ?>
            </strong>
        </p>
        <p>Profissão:
            <strong>
                <?=
                $dadosSessao["profissao"] ?? "";
                ?>
            </strong>
        </p>
        <hr>
        <div class="action">

            <button>Editar</button>
            <button>Excluir</button>
        </div>

    </div>

<?php else: ?>
    <div class="card">
        <?= $dadosSessao["msg"]; ?>
    </div>
<?php endif ?>