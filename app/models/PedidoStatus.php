<?php
namespace App\Models;

interface PedidoStatus
{
	public function aprovar(Pedido $pedido);
	public function suspender(Pedido $pedido);
	public function isAprovado();
	public function isSuspenso();
}