<?php
namespace App\Libraries;

use App\Models\Pedido;

interface PedidoObserver
{
    public function execute(Pedido $pedido);
}