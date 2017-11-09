<?php
namespace App\Libraries;

use App\Models\Pedido;

interface PedidoValidator 
{
    public function __construct(PedidoValidator $proximo = null);
    public function validate(Pedido $pedido);
}