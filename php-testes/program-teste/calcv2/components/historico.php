<!-- Histórico dos calculos realizados -->
<div class="col px-3"> <!--p-3Colum 2-->

    <?php if (!empty($_SESSION['data'])): ?>
        <?php foreach ($_SESSION['data'] as $item): ?>

            <div class="row border border-info bg-info-subtle   p-2 my-2  rounded align-items-center">
                <!-- ID do calculo realizado -->
                <div class="col-3 fw-bold text-primary-emphasis ">ID.<?= $item['id']; ?></div>

                <!-- Descrição da conta -->
                <div class="col-9">

                    <!-- Resultado do Calculo -->
                    <div class="row  align-items-center">
                        <div class="col-8 text-primary-emphasis text-md-center ">
                            <div class="row">
                                <div class="col-12 fst-italic" style="font-size: 0.9rem;"><?= $item['titulo']; ?></div>
                                <div class="col-12">
                                    <?= $item['numero1'] . " " . $item['operacao'] . " " . $item['numero2'] . " = " . $item['resultado']; ?>
                                    <!-- 10 + 10 = 20 -->
                                </div>
                            </div>

                        </div>

                        <!-- Botões de Ação (Remover e Editar) -->
                        <div class="col-4 text-center">
                            <div class="row ">
                                <div class="col">
                                    <form method="GET" action="index.php">
                                        <input type="hidden" name="editar" value="<?= $item['id']; ?>" />
                                        <button class="btn btn-sm  btn-primary text-secondary ">
                                            <i class="bi bi-pencil-square text-white" style="font-size: 20px;"></i>
                                        </button>
                                    </form>
                                </div>
                                <div class="col">
                                    <form method="GET" action="index.php">
                                        <input type="hidden" name="remover" value="<?= $item['id']; ?>" />
                                        <button class="btn btn-sm  btn-danger text-secondary ">
                                            <i class="bi bi-trash text-white" style="font-size: 20px;"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>

    <?php else: ?>
        <div class="row border border-danger bg-danger-subtle gy-2 p-2 rounded align-items-center">
            <p class="text-danger text-center">Nenhum item cadastrado.</p>
        </div>
    <?php endif; ?>

</div>