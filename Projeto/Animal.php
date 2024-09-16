<?php

abstract class Animais
{
    private $nome;
    private $raca;
    private $peso;
    private $tamanho;

    public function __construct($nome, $raca, $peso, $tamanho) {
        $this->nome = $nome;
        $this->raca = $raca;
        $this->peso = $peso;
        $this->tamanho = $tamanho;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getRaca() {
        return $this->raca;
    }

    public function setRaca($raca) {
        $this->raca = $raca;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function getTamanho() {
        return $this->tamanho;
    }

    public function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }

    abstract public function falar();
}
