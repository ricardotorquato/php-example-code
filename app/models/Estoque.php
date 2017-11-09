<?php
namespace App\Models;

class Estoque 
{
    private $produtos = [];

    public static function getInstance()
    {
        static $instance = null;
        if (null === $instance) {
            $instance = new static();
        }

        return $instance;
    }

    private function __construct()
    {
    }

    public function addProduto(Produto $produto)
    {
        $this->produtos[] = $produto;
    }

    public function getProduto(Produto $produto)
    {
        foreach($this->produtos as $prod) {
            if ($prod->getId() == $produto->getId())
                return $prod;
        }

        return null;
    }
}