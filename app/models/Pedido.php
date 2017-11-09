<?php
namespace App\Models;

class Pedido 
{
	private $produtos;
	private $status;
	private $fatura;
	private $cliente;

	public function __construct()
	{
		$this->status = new PedidoNovo();
	}

	public function addProduto(Produto $produto)
	{
		$this->produtos[] = $produto;
	}

	public function aprovar()
	{
		$this->status->aprovar($this);
	}

	public function suspender()
	{
		$this->status->suspender($this);
	}

	public function isAprovado()
	{
		return $this->status->isAprovado();
	}

	public function isSuspenso()
	{
		return $this->status->isSuspenso();
	}

	public function setStatus(PedidoStatus $status)
	{
		$this->status = $status;
	}

	public function getProdutos()
	{
		return $this->produtos;
	}

	public function getCliente()
	{
		return $this->cliente;
	}

	public function setCliente(Cliente $cliente)
	{
		$this->cliente = $cliente;
	}

	public function getFatura()
	{
		return $this->fatura;
	}

	public function setFatura(Fatura $fatura)
	{
		$this->fatura = $fatura;
	}
}