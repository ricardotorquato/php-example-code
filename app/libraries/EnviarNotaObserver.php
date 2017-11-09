<?php
namespace App\Libraries;

use App\Models\Pedido;

class EnviarNotaObserver implements PedidoObserver
{
    public function execute(Pedido $pedido)
    {
        /*
         * Aqui deveria realizar as duas operações abaixo
         *   mas como o objetivo aqui é exemplificar o uso de padrões, 
         *     as duas funções não serão implementadas somente simuladas
         */
        echo "buscando pdf da nota " . $pedido->getFatura()->getNumero() . " no servidor da SEFAZ\n";
        echo "enviando nota " . $pedido->getFatura()->getNumero() . " para e-mail do cliente\n";

        return $pedido;
    }
}