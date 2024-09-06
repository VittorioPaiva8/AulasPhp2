<?php

class Cachorro
{
    function latir()
    {
        echo "Auau krl";
    }
    function andar($m)
    {
        echo "\nO cachorro andou $m metros esse ultimo dia";
    }
}

$frederico_o_cao_da_morte = new Cachorro;

$FredyNeto = new Cachorro;

$frederico_o_cao_da_morte->latir();
$FredyNeto->andar(120);
