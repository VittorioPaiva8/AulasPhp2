
<?php

class Cachorro extends Animais {

public function __construct($nome, $raca, $peso, $tamanho) {
    parent::__construct($nome, $raca, $peso, $tamanho);
}

public function falar() {
    echo "O cachorro " . $this->getNome() . " faz: Au Au Krl";
}
}