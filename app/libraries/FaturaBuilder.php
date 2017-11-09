<?php
namespace App\Libraries;

use App\Models\Pedido;
use App\Models\Fatura;
use App\Models\ItemFatura;

class FaturaBuilder
{
    private $fatura;
    private $numero;
    private $dataVencimento;
    private $cliente;
    private $itens = [];
    private $valor = 0;

    public function aPartirDo(Pedido $pedido)
    {
        $this->cliente = $pedido->getCliente();

        foreach($pedido->getProdutos() as $produto) {
            $this->itens[] = new ItemFatura($produto, $produto->getQuantidade(), $produto->getValor());
            $this->valor += $produto->getValor() * $produto->getQuantidade();
        }

        return $this;
    }

    public function comVencimento($dataVencimento)
    {
        $this->dataVencimento = $data;

        return $this;
    }

    public function comVencimentoHoje()
    {
        $this->dataVencimento = date('d/m/Y');

        return $this;
    }

    public function build()
    {
        $this->fatura = new Fatura($this->numero, $this->dataVencimento, $this->cliente, $this->valor);
        $this->fatura->setItens($this->itens);

        return $this->fatura;
    }
}