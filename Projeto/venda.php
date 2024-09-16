<?php

class Venda {
    private $produtos; 
    private $humano;  
    private $total;   


    public function __construct($humano) {
        $this->produtos = [];
        $this->humano = $humano;
        $this->total = 0.0;
    }

    public function adicionarProduto(Produto $produto, $quantidade) {
        if ($quantidade > 0) {
            $produto->reduzirQuantidade($quantidade);
            $this->produtos[] = [
                'produto' => $produto,
                'quantidade' => $quantidade,
                'subtotal' => $produto->getPreco() * $quantidade
            ];
            $this->total += $produto->getPreco() * $quantidade;
        } else {
            echo "Quantidade inválida";
        }
    }
    public function exibirVenda() {
        echo "Venda para: " . $this->humano->getNome();
        echo "Produtos:";
        foreach ($this->produtos as $item) {
            echo "- " . $item['produto']->getNome() . ": R$ " . $item['produto']->getPreco() . " x " . $item['quantidade'] . " = R$ " . $item['subtotal'];
        }
        echo "Total: R$ " . $this->total;
    }
}

?>
