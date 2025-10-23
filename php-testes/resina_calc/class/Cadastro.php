<?php

class Cadastro
{
    public function __construct(private string $nomeMolde, private float $qntdMolde) {}

    public function __getNomeMolde()
    {
        return $this->nomeMolde;
    }

    public function __getQntdMolde()
    {
        return $this->qntdMolde;
    }
}
