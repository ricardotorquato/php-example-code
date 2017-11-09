<?php
namespace App\Libraries;

use App\Models\Pedido;
use App\Models\Estoque;

class BaixarEstoqueObserver implements PedidoObserver
{
    public function execute(Pedido $pedido)
    {
        $estoque = Estoque::getInstance();

        foreach($pedido->getProdutos() as $item)
            $estoque->getProduto($item)->baixarEstoque($item->getQuantidade());

        return $pedido;
    }
}