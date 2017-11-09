<?php
namespace App\Models;

class PedidoAprovado implements PedidoStatus
{
	public function aprovar(Pedido $pedido)
	{
		throw new Exception("Pedido já aprovado");
	}

	public function suspender(Pedido $pedido)
	{
		$pedido->setStatus(new PedidoSuspenso());
	}

	public function isAprovado()
	{
		return true;
	}

	public function isSuspenso()
	{
		return false;
	}
}