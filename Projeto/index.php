<?php

$usuarios = [
    'admin' => '123'
];

$log = [];
$valor_total_vendas = 0.0;
$logado = false;

include 'Animal.php';
include 'cachorro.php';
include 'gato.php';
include 'coelho.php';
include 'produto.php';
include 'venda.php';
include 'humanos.php';
include 'funcionarios.php';
include 'vendedor.php';
include 'veterinario.php';
include 'balconista.php';

function login()
{
    global $logado, $usuarios;
    $usuario = readline("Digite seu usuário: ");
    $senha = readline("Digite sua senha: ");

    if (array_key_exists($usuario, $usuarios) && $senha == $usuarios[$usuario]) {
        echo "Bem-vindo, $usuario!\n";
        registrarLog("Usuário fez login: $usuario");
        $logado = true;
    } else {
        echo "Usuário ou senha incorretos.\n";
        $logado = false;
    }
}

function deslogar()
{
    global $logado;
    registrarLog("Usuário deslogou");
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
    }
}

function segundoMenu()
{
    $chamarMenu = readline("Quem está realizando o atendimento: 1-Vendedor 2-Veterinário 3-Balconista 4-Gerenciar Produtos: ");

    switch ($chamarMenu) {
        case 1:
        case 3:
            homeLoja();
            break;
        case 2:
            realizarAtendimento();
            break;
        case 4:
            gerenciarProdutos();
            break;
    }
}

function homeLoja()
{
    global $valor_total_vendas;
    echo "Total de vendas: R$ " . number_format($valor_total_vendas, 2, ',', '.') . "\n";
    echo "\n1-Venda \n2-Verificar log \n3-Deslogar: ";
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
    echo "Digite o nome do produto: ";
    $nomeProduto = trim(fgets(STDIN));

    echo "Digite o preço do produto: ";
    $precoProduto = trim(fgets(STDIN));

    echo "Digite a quantidade do produto: ";
    $quantidadeProduto = trim(fgets(STDIN));

    if (is_numeric($precoProduto) && is_numeric($quantidadeProduto) && $precoProduto > 0 && $quantidadeProduto > 0) {
        $produto = new Produto($nomeProduto, (float)$precoProduto, (int)$quantidadeProduto);
        $humano = new Humano("Usuário", 30, "Endereço", "Contato"); // Substitua com o humano logado
        $venda = $humano->criarVenda();
        $venda->adicionarProduto($produto, $quantidadeProduto);
        $valor_total_vendas += $produto->getPreco() * $quantidadeProduto;
        registrarLog("Venda registrada: Produto - $nomeProduto, Quantidade - $quantidadeProduto, Preço - R$ $precoProduto");
        echo "Venda registrada com sucesso!\n";
        $venda->exibirVenda();
    } else {
        echo "Dados inválidos.\n";
    }
}

function realizarAtendimento()
{
    global $valor_total_vendas;

    limparTela();
    echo "Digite o nome do procedimento realizado: ";
    $procedimento = trim(fgets(STDIN));

    echo "Digite o valor: ";
    $valor = trim(fgets(STDIN));

    if (is_numeric($valor) && $valor > 0) {
        $valor_total_vendas += $valor;
        registrarLog("Atendimento realizado: Procedimento - $procedimento, Valor - R$ $valor");
        echo "Atendimento registrado com sucesso!\n";
    } else {
        echo "Valor inválido.\n";
    }
}
function gerenciarProdutos()
{
    global $produtos;
    $produtos = [];

    while (true) {
        limparTela();
        echo "Gerenciamento de Produtos:\n";
        echo "1-Adicionar Produto\n2-Listar Produtos\n3-Voltar\n";
        $opcao = readline("Escolha uma opção: ");

        switch ($opcao) {
            case 1:
                adicionarProduto();
                break;
            case 2:
                listarProdutos();
                break;
            case 3:
                return;
        }
    }
}

function adicionarProduto()
{
    global $produtos;
    echo "Digite o nome do produto: ";
    $nome = trim(fgets(STDIN));

    echo "Digite o preço do produto: ";
    $preco = trim(fgets(STDIN));

    echo "Digite a quantidade do produto: ";
    $quantidade = trim(fgets(STDIN));

    if (is_numeric($preco) && is_numeric($quantidade) && $preco > 0 && $quantidade > 0) {
        $produtos[] = new Produto($nome, (float)$preco, (int)$quantidade);
        registrarLog("Produto adicionado: Nome - $nome, Preço - R$ $preco, Quantidade - $quantidade");
        echo "Produto adicionado com sucesso!\n";
    } else {
        echo "Dados inválidos.\n";
    }
}

function listarProdutos()
{
    global $produtos;
    echo "Lista de Produtos:\n";
    foreach ($produtos as $produto) {
        echo "Nome: " . $produto->getNome() . ", Preço: R$ " . number_format($produto->getPreco(), 2, ',', '.') . ", Quantidade: " . $produto->getQuantidade() . "\n";
    }
}

while (true) {
    if ($logado) {
        segundoMenu();
    } else {
        primeiroMenu();
    }
}
