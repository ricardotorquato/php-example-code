<?php
namespace App\Models;

class PedidoSuspenso implements PedidoStatus
{
	public function aprovar(Pedido $pedido)
	{
		$pedido->setStatus(new PedidoAprovado());
	}

	public function suspender(Pedido $pedido)
	{
		throw new Exception("Pedido já suspenso");
	}

	public function isAprovado()
	{
		return false;
	}

	public function isSuspenso()
	{
		return true;
	}
}