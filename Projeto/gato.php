<?php

class Gato extends Animais {

public function __construct($nome, $raca, $peso, $tamanho) {
    parent::__construct($nome, $raca, $peso, $tamanho);
}

public function falar() {
    echo "O gato " . $this->getNome() . "Miau miau Krl";
}
}