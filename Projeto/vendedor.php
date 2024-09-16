<?php

class Vendedor extends Funcionario {

    public function __construct($nome, $idade, $endereco, $contato) {
        parent::__construct($nome, $idade, $endereco, $contato, 2000.00);
    }
    public function calcularSalario($numeroVendas) {
        $salarioBase = 2000.00;
        if ($numeroVendas >= 5) {
            $salarioBase += 300;
        } elseif ($numeroVendas >= 3) {
            $salarioBase += 170;
        } elseif ($numeroVendas >= 1) {
            $salarioBase += 50;
        }
        $this->setSalario($salarioBase);
        echo "Vendedor Recebeu: R$ " . $this->getSalario();
    }
}

?>
