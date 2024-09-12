<?php

class Pessoa
{
    public $nome = 'Pedro';
    public $idade = 1;
    public $diaNascimento = 1;
    public $mesNascimento = 1;
    public $anoNascimento = 1;
    public $hoje;

    public function __construct()
    {
        $this->hoje = new DateTime();
    }

    public function calcularIdade()
    {

        $dataNascimento = new DateTime("{$this->anoNascimento}-{$this->mesNascimento}-{$this->diaNascimento}");

        $intervalo = $this->hoje->diff($dataNascimento);

        $this->idade = $intervalo->y;

        return $this->idade;
    }

    public function retornaNome()
    {
        echo "\nO nome da pessoa é {$this->nome} ";
    }
}

$pessoa = new Pessoa();
$pessoa->diaNascimento = 15;
$pessoa->mesNascimento = 9;
$pessoa->anoNascimento = 1993;

echo "Idade: " . $pessoa->calcularIdade();
echo $pessoa->retornaNome();
