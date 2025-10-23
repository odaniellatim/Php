<?php

/**
 * Cria, Edita e Apaga diretorios
 */
function diretorios()
{

    //Cria um diretorio
    mkdir("Nome_da_pasta");

    //Apaga o diretorio se existir, mas não apaga se existir arquivos internos.
    rmdir("Nome_da_pasta");

    //Renomeia uma pasta existente.
    rename("Nome_da_pasta_atual", "novo_nome");
}

/**
 * Faz a leitura do arquivo
 */
function leitura_arquivo()
{
    $caminhoArquivo = "nome.txt";
    $caminhoArquivoCompleto = realpath($caminhoArquivo);

    if (file_exists($caminhoArquivo)) {

        $arquivo = fopen("nome.txt", "r");

        echo "Arquivo Localizado em: <strong>$caminhoArquivoCompleto</strong> <br>";

        while (!feof($arquivo)) {
            $nome = fgets($arquivo);
            echo $nome;
            echo "<br>";
        }

        fclose($arquivo);
    } else {
        echo "Arquivo não encontrado ou não existe.";
    }
}

/**
 * Cria e escreve no arquivo
 */
function escrita_aquivo()
{
    $arquivo = fopen("nome.txt", "a+") or die("Erro ao escrever no arquivo");

    fwrite($arquivo, "Beth\n");

    fclose($arquivo);
    echo "Dados adicionado com sucesso. <br>";
}

// escrita_aquivo();
leitura_arquivo();
