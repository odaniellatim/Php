<div class="row-12 mt-2">

    <div class="col bg-body-tertiary rounded border border-dark-subtle px-2">
        <div class="text-center text-dark fs-4 fw-bold mt-2 ">
            <p>Log para testes</p>
            <hr>
        </div>
        <p>
            <?php

            if (!empty($_SESSION['log'])) {
                $logs = array_reverse($_SESSION['log']) ?? "";
                foreach ($logs as $relatorio) {
                    $logError = $relatorio['error'] ? "text-danger" : "text-success";
                    echo "<p class=" . $logError . ">" . $relatorio['id'] . ". " . $relatorio['msg'] . "</p>";
                }
            } else {
                echo "<p class='text-dark'> Nenhuma ação realizada. </p>";
            }

            ?>
        </p>
    </div>
</div>