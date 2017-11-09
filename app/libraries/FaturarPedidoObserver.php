<?php
namespace App\Libraries;

use App\Models\Pedido;

class FaturarPedidoObserver implements PedidoObserver
{
    public function execute(Pedido $pedido)
    {
        $pedido->setFatura((new FaturaBuilder)->aPartirDo($pedido)->comVencimentoHoje()->build());

        return $pedido;
    }
}