<?php
class Calculadora
{
    public int $id;
    public string $titulo;
    public float $num1;
    public float $num2;
    public string $operador;

    public function __construct(int $id, string $titulo, float $num1, float $num2, string $operador)
    {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->num1 = $num1;
        $this->num2 = $num2;
        $this->operador = $operador;
    }

    public function operacao()
    {
        switch ($this->operador) {
            case "+":
                return $this->somar();
                break;
            case "-":
                return $this->subtrair();
                break;
            case "*":
                return $this->multiplicar();
                break;
            case "/":
                return $this->dividir();
                break;
            case "%":
                return $this->porcentagem();
                break;
        }
    }

    public function setId()
    {
        return $this->id =  rand(1, 1000);
    }

    public function somar()
    {
        return $this->num1 + $this->num2;
    }

    public function subtrair()
    {
        return $this->num1 - $this->num2;
    }

    public function multiplicar()
    {
        return $this->num1 * $this->num2;
    }

    public function dividir()
    {
        return $this->num1 / $this->num2;
    }

    public function porcentagem()
    {
        return ($this->num1 * $this->num2) / 100;
    }
}

// $calc = new Calculadora("Teste", 10, 5, "somar");

// echo $calc->operacao();
