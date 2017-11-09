<?php
namespace App\Models;

class Produto 
{
	private $id;
	private $nome;
	private $valor;
	private $quantidade;
	private $descontoVendedor;

	public function __construct(
		$id, 
		$nome, 
		$quantidade = 0, 
		$valor = 0.00, 
		$descontoVendedor = 0.00
	) {
		$this->id = $id;
		$this->nome = $nome;
		$this->valor = $valor;
		$this->quantidade = $quantidade;
		$this->descontoVendedor = $descontoVendedor;
	}

	public function temDisponivel($quantidade)
	{
		if (0 <= ($this->quantidade - $quantidade)) {
			return true;
		}

		return false;
	}

	public function baixarEstoque($quantidade)
	{
		$this->quantidade -= $quantidade;
	}

	public function getValorComDesconto()
	{
		return $this->valor - $this->descontoVendedor;
	}

	public function getId()
	{
		return $this->id;
	}

	public function getValor()
	{
		return $this->valor;
	}
	
	public function getQuantidade()
	{
		return $this->quantidade;
	}
}
	