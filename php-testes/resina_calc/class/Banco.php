<?php

class Banco
{
    private array $dados;

    public function __construct()
    {
        $this->dados = [];
    }

    public function gravarDados($arrayDados)
    {
        $this->dados[] = $arrayDados;
    }
}
