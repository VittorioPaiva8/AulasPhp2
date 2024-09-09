<?php


class Data
{
    public $dia = 1;
    public $mes = 1;
    public $ano = 1970;

    public function apresentar()
    {
        echo "A data é $this->dia/$this->mes/$this->ano;";
    }
}

$d1 = new Data();
$d1->apresentar();

$d2 = new Data();
$d2->dia = 24;
$d2->ano = 2004;
$d2->apresentar();
