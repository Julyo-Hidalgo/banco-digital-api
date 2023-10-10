<?php

namespace App\Model;

use App\DAO\chavePixDAO;

class chavePixModel extends model
{
    public $id, $chave, $tipo, $id_conta;
    
    public function save() : bool
    {
        return (new chavePixDAO())->insert($this);
    }
}