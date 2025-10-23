<?php

// validação do formulario
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // !empty($_POST['nome']) && !empty($_POST['idade']) && !empty($_POST['sexo']) && !empty($_POST['salario']) && !empty($_POST['emprego']) && !empty($_POST['profissao'])
    if (empty($_POST['nome'])) {
        $classError = "error";
        $msg = "O campo nome é obrigatório";
    } else {
        $dadosUsuario = cadastroUsuarios();
        startSessao("dadosUser", $dadosUsuario);
    }
}
?>

<h2> Pagina Cadastro</h2>
<form action="" method="POST">
    <label>Nome: </label>
    <input class="<?= $classError ?? ""; ?>" type="text" name="nome" value="<?= $nome ?? ''; ?>" placeholder="<?= $msg ?? "Preencha o campo nome"; ?>" />

    <label>Idade: </label>
    <input type="number" name="idade" value="<?= $idade ?? ''; ?>" />

    <label>Sexo: </label>
    <select name="sexo">
        <option value="null" selected>Selecione uma opção</option>
        <option value="Masculino">Masculino</option>
        <option value="Feminino">Feminino</option>
    </select>

    <label>Salário: </label>
    <input type="number" name="salario" value="<?= $salario ?? ''; ?>" />

    <label>Status Emprego:</label>
    <select name="emprego">
        <option value="null" selected>Selecione uma opção</option>
        <option value="Empregado">Empregado</option>
        <option value="Desempregado">Desempregado</option>
    </select>

    <label>Profissão: </label>
    <select name="profissao">
        <option selected>Selecione uma opção</option>
        <option value="Marcenaria">Marcenerio</option>
        <option value="Pintor">Pintor</option>
        <option value="Engenhario">Engenheiro</option>
        <option value="Eletricista">Eletricista</option>
        <option value="Fachineira">Fachineira</option>
        <option value="Encanador">Encanador</option>
        <option value="Soldador">Soldador</option>
    </select>

    <button>Cadastrar Ficha</button>
</form>