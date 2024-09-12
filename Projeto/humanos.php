<?php

class FichaTecnica
{
    public $nome = '';
    public $idade = 18;
    public $endereco = '';
    public $contato = '';


    function __construct($nome1, $idade = 18, $endereco, $contato)
    {
        $this->nome = $nome1;
        $this->idade = $idade;
        $this->endereco = $endereco;
        $this->contato = $contato;
    }
}
