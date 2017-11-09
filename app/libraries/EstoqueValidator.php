<?php
namespace App\Libraries;

use App\Models\Pedido;
use App\Models\Estoque;

class EstoqueValidator implements PedidoValidator
{
    private $proximo;

    public function __construct(PedidoValidator $proximo = null)
    {
        $this->proximo = $proximo;
    }

    public function validate(Pedido $pedido)
    {
        $estoque = Estoque::getInstance();

        foreach($pedido->getProdutos() as $item) {
            if(!$estoque->getProduto($item)->temDisponivel($item->getQuantidade()))
                return false;
        }

        if ($this->proximo != null)
            return $this->proximo->validate($pedido);

        return true;
    }
}