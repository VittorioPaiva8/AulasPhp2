<?php

class Humano {
    private $nome;
    private $idade;
    private $endereco;
    private $contato;
    private $animais;
    public function __construct($nome, $idade, $endereco, $contato) {
        $this->nome = $nome;
        $this->idade = $idade;
        $this->endereco = $endereco;
        $this->contato = $contato;
        $this->animais = [];
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getIdade() {
        return $this->idade;
    }

    public function setIdade($idade) {
        $this->idade = $idade;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function getContato() {
        return $this->contato;
    }

    public function setContato($contato) {
        $this->contato = $contato;
    }

    public function adicionarAnimal(Animais $animal) {
        $this->animais[] = $animal;
    }

    public function getAnimais() {
        return $this->animais;
    }


    public function criarVenda() {
        return new Venda($this);
    }
}

?>
