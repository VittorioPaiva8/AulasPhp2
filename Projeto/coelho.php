<?php

class Coelho extends Animais {

public function __construct($nome, $raca, $peso, $tamanho) {
    parent::__construct($nome, $raca, $peso, $tamanho);
}

public function falar() {
    echo "O coelho " . $this->getNome() . " faz:Sons de coelho";
}
}