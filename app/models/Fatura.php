<?php
namespace App\Models;

class Fatura 
{
    private $numero;
    private $dataVencimento;
    private $cliente;
    private $itens = [];
    private $valor;

    public function __construct(
        $numero,
        $dataVencimento,
        Cliente $cliente,
        $valor
    ) {
        $this->numero = $numero;
        $this->dataVencimento = $dataVencimento;
        $this->cliente = $cliente;
        $this->valor = $valor;
    }

    public function addItem(ItemFatura $item)
    {
        $this->itens[] = $item;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setItens($itens)
    {
        $this->itens = $itens;
    }
}