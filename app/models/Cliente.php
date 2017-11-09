<?php
namespace App\Models;

class Cliente 
{
    private $id;
    private $cpfCnpj;
    private $razaoSocial;
    private $email;
    private $nomeFantasia; 

    public function __construct($cpfCnpj, $razaoSocial, $email, $nomeFantasia)
    {
        $this->cpfCnpj = $cpfCnpj;
        $this->razaoSocial = $razaoSocial;
        $this->nomeFantasia = $nomeFantasia;
        $this->email = $email;
    }
}