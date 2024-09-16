<?php


class Balconista extends Funcionario {

    public function __construct($nome, $idade, $endereco, $contato) {

        parent::__construct($nome, $idade, $endereco, $contato, 1500.00);
    }

    public function calcularSalario($parametro = null) {
        echo "Balconista Recebeu: R$ " . $this->getSalario();
    }
}

?>
