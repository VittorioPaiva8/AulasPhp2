<?php

$usuarios = [
    'admin' => 123
];
function login()
{
    global $logado, $usuarios;
    $usuario = readline("Digite seu usuario: ");
    $senha = readline("Digite sua senha: ");

    if (array_key_exists($usuario, $usuarios)) {
        if ($senha == $usuarios[$usuario]) {
            echo 'Bem vindo 3';
            registrarLog("Usuário Fez login");
            $logado = 1;
        }
    } else if ($usuario == '' || $senha == '') {
        $logado = 2;
        echo 'Preencha os campos';
    } else {
        echo "Usuario incorreto";
        $logado = 2;
    }
}
function deslogar()
{
    global $logado;

    registrarLog("Usuário $logado fez logout");
    $logado = false;
    echo "Deslogado com sucesso!\n";
}
function cadastrarUsuario()
{
    global $usuarios;

    limparTela();
    echo "Digite o novo login: ";
    $login = trim(fgets(STDIN));

    echo "Digite a nova senha: ";
    $senha = trim(fgets(STDIN));

    if (!isset($usuarios[$login])) {
        $usuarios[$login] = $senha;
        registrarLog("Novo usuário cadastrado: $login");
        echo "Usuário cadastrado com sucesso!\n";
    } else {
        echo "Login já existente.\n";
    }
}

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
function primeiroMenu()
{
    $chamarMenu = readline("1-Login 2-Cadastrar 3-Sair: ");

    switch ($chamarMenu) {
        case 1:
            login();
            break;
        case 2:
            cadastrarUsuario();
            break;
        case 3:
            exit;
            break;
    }
}

function SegundoMenu()
{
    $chamarMenu = readline("Quem esta realizando o atendimento: 1-Vendedor 2-Veterinario 3-Balconista: ");

    switch ($chamarMenu) {
        case 1:
            homeLoja();
            break;
        case 2:
            realizarAtendimento();
            break;
        case 3:
            homeLoja();
            break;
    }
}


function homeLoja()
{
    global $valor_total_vendas;
    echo "Total de vendas: R$ " . number_format($valor_total_vendas, 2, ',', '.') . "\n";
    echo "\n 1-Venda \n 2-Verificar log \n 3-Deslogar: ";
    $menu = readline();

    switch ($menu) {
        case 1:
            realizarVenda();
            break;
        case 2:
            exibirLog();
            break;
        case 3:
            deslogar();
            break;
    }
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
function realizarAtendimento()
{
    global $valor_total_vendas;

    limparTela();
    echo "Digite o nome do Procedimento realizado: ";
    $item = trim(fgets(STDIN));

    echo "Digite o valor: ";
    $valor = trim(fgets(STDIN));

    if (is_numeric($valor) && $valor > 0) {
        $valor_total_vendas += $valor;
        registrarLog("Venda realizada: Item - $item, Valor - $valor");
        echo "Venda registrada com sucesso!\n";
    } else {
        echo "Valor inválido.\n";
    }
}
$logado = false;

while (true) {
    if ($logado == 1) {
        segundoMenu();
    } else if ($logado == 2) {
        primeiroMenu();
    }
}
