<?php



class Pessoa
{
    public $nome = '';
    public $idade = 1;
    public $diaNascimento = 1;
    public $mesNascimento = 1;
    public $anoNascimento = 1;
}



class DataAtual
{
    public $dia = 1;
    public $mes = 1;
    public $ano = 1970;

    public function apresentar()
    {
        echo "A data é $this->dia/$this->mes/$this->ano;";
    }
}

$d1 = new DataAtual();
$d1->apresentar();

$d2 = new DataAtual();
$d2->dia = 24;
$d2->ano = 2004;
$d2->apresentar();
