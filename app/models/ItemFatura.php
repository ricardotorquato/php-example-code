<?php
namespace App\Models;

class ItemFatura 
{
    private $produto;
    private $quantidade;
    private $valor;

    public function __construct($produto, $quantidade, $valor)
    {
        $this->produto = $produto;
        $this->quantidade = $quantidade;
        $this->valor = $valor;
    }
}