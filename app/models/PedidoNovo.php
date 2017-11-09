<?php
namespace App\Models;

class PedidoNovo implements PedidoStatus
{
	public function aprovar(Pedido $pedido)
	{
		$pedido->setStatus(new PedidoAprovado());
	}

	public function suspender(Pedido $pedido)
	{
		$pedido->setStatus(new PedidoSuspenso());
	}

	public function isAprovado()
	{
		return false;
	}

	public function isSuspenso()
	{
		return false;
	}
}