<?php


abstract class Funcionario extends Humano {
    protected $salario;

    public function __construct($nome, $idade, $endereco, $contato, $salario) {
        parent::__construct($nome, $idade, $endereco, $contato);
        $this->salario = $salario;
    }

    public function getSalario() {
        return $this->salario;
    }

    public function setSalario($salario) {
        $this->salario = $salario;
    }

    abstract public function calcularSalario($parametro);
}