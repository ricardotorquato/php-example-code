<?php
/**
 * ATENÇÃO!!!
 * 
 * Este código (deste arquivo index.php) foge a todos os padrões, e está aqui somente para testar o fluxo das classes 
 *   uma vez que somente foi desenhada a solução e não a aplicação como um todo para realização dos pedidos
 *
 **/

require_once("vendor/autoload.php");

print "<pre>";

//Precisamos ter alguns produtos em estoque
$estoque = \App\Models\Estoque::getInstance();
$estoque->addProduto(new \App\Models\Produto(1, 'Computador', 15, 2500.00, 250.00));

//Um cliente irá solicitar um pedido ao vendedor
$cliente = new \App\Models\Cliente(
    12345678000101, 
    'Torquatos LTDA', 
    'torquatto@msn.com', 
    'Torquatos Company'
);

//Vendedor vai criar o pedido
$pedido = new \App\Models\Pedido();
$pedido->setCliente($cliente);
$pedido->addProduto(new \App\Models\Produto(1, 'Computador', 3, 2300.00));

//Pedido precisa passar por verificações (chain of responsability)
$desconto = new \App\Libraries\DescontoValidator();
$estoque = new \App\Libraries\EstoqueValidator($desconto);

//Se o pedido passou por todas as validações
if ($estoque->validate($pedido)) {
    $pedido->aprovar();

    //Agora precisamos executar todas as ações (Observer)
    $observers = [
        new \App\Libraries\FaturarPedidoObserver(),
        new \App\Libraries\BaixarEstoqueObserver(),
        new \App\Libraries\EnviarNotaObserver(),
    ];

    foreach($observers as $observer) {
        $observer->execute($pedido);
    }
} else {
    $pedido->suspender();
}

var_dump($pedido);