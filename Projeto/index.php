<?php

function registrarLog($mensagem)
{
    global $log;
    $data_hora = date('d/m/Y H:i:s');
    $log[] = "$data_hora - $mensagem";
}

function exibirLog()
{
    global $log;
    foreach ($log as $entry) {
        echo "$entry\n";
    }
}

function limparTela()
{
    system('clear');
}

function realizarVenda()
{
    global $valor_total_vendas;

    limparTela();
    echo "Digite o nome do item vendido: ";
    $item = trim(fgets(STDIN));

    echo "Digite o valor da venda: ";
    $valor = trim(fgets(STDIN));

    if (is_numeric($valor) && $valor > 0) {
        $valor_total_vendas += $valor;
        registrarLog("Venda realizada: Item - $item, Valor - $valor");
        echo "Venda registrada com sucesso!\n";
    } else {
        echo "Valor inválido.\n";
    }
}
