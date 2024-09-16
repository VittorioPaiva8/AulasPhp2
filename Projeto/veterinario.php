<?php
class Veterinario extends Funcionario {

    public function __construct($nome, $idade, $endereco, $contato) {

        parent::__construct($nome, $idade, $endereco, $contato, 4000.00);
    }

    public function calcularSalario($numeroAtendimentos) {
        $salarioBase = 4000.00;
        if ($numeroAtendimentos >= 5) {
            $salarioBase += 700;
        } elseif ($numeroAtendimentos >= 3) {
            $salarioBase += 300;
        } elseif ($numeroAtendimentos >= 1) {
            $salarioBase += 100;
        }
        $this->setSalario($salarioBase);
        echo "Veterinário Recebeu: R$ " . $this->getSalario();
    }
}

?>
