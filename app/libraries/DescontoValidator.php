<?php
namespace App\Libraries;

use App\Models\Pedido;
use App\Models\Estoque;

class DescontoValidator implements PedidoValidator
{
    private $proximo;

    public function __construct(PedidoValidator $proximo = null)
    {
        $this->proximo = $proximo;
    }

    public function validate(Pedido $pedido)
    {
        $estoque = Estoque::getInstance();
        $valorTotalComDesconto = 0;
        $valorTotalPedido = 0;

        foreach($pedido->getProdutos() as $item) {
            $valorTotalComDesconto += $estoque->getProduto($item)->getValorComDesconto();
            $valorTotalPedido += $item->getValor();
        }

        if($valorTotalComDesconto > $valorTotalPedido)
            return false;

        if ($this->proximo != null)
            return $this->proximo->validate($pedido);

        return true;
    }
}