<!-- Formulario para realizar o calculo -->
<div class="row g-2 align-items-start "> <!--Colum 1-->

    <div class="col-12 col-md-5 p-1">
        <!-- p-3 -->
        <!-- Campos para colocar os valores numericos -->
        <form class="p-3 rounded border bg-body-tertiary" method="POST" action="">

            <!-- Titulo para explicar sobre a operação -->
            <fieldset class="mb-3">
                <label class="form-label " for="descricao">Titulo</label>
                <input class="form-control form-select-lg" type="text" name="descricao" id="descricao" placeholder="Valor de 10 Laranjas." />
            </fieldset>

            <fieldset class="input-group  mb-3">
                <label class="input-group-text text-dark" for="numero1">Nº1</label>
                <input class="form-control form-select-lg" type="number" name="numero1" step="0.01" />
            </fieldset>


            <fieldset class="input-group mb-3">
                <label class="input-group-text text-dark" for="numero2">Nº2</label>
                <input class="form-control form-select-lg" type="number" name="numero2" step="0.01" />
            </fieldset>

            <!-- Operadores Matematicos -->
            <select name="operacao" class="form-select form-select-lg mb-3" aria-label="Large select example">
                <option value="" selected>Selecione um operador</option>
                <option value="+">Somar</option>
                <option value="-">Subtrair</option>
                <option value="/">Dividir</option>
                <option value="*">Multiplicar</option>
                <option value="%">Porcentagem</option>
            </select>

            <!-- Botão de Enviar Formulario -->
            <div class="d-grid gap-2">
                <button class="btn btn-lg btn-primary mt-3">Calcular</button>
            </div>

        </form>

        <?php if (!empty($erro)): ?>
            <p class="text-danger text-center  mt-3"><?= $erro ?? ""; ?></p>
        <?php endif; ?>

        <?php if (!empty($sucesso)): ?>
            <p class="text-success text-center mt-3"><?= $sucesso ?? ""; ?></p>
        <?php endif; ?>
    </div>

    <!-- Lista com o historico dos calculos realizados -->
    <?php require_once("./components/historico.php");
    ?>

</div>