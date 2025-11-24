<?php
require_once("Calculadora.php");

class Historico
{
    private array $calculos = [];

    public function addCalculos(array $calculadora): void
    {
        $this->calculos[] = $calculadora;
    }

    public function removerCalculo(Calculadora $calculadora): void
    {
        $this->calculos = array_filter(
            $this->calculos,
            fn($calculoAtual) => $calculoAtual === $calculadora
        );
    }
}
