<?php

namespace App\Model;

use App\DAO\transacao_correntista_assocDAO;
use App\DAO\transacaoDAO;

class transacaoModel extends model{
    public $id, $valor, $data_transacao;

    public function save() : bool
    {
        
        $response = (new transacaoDAO())->insert($this);
        
        return $response;
    }
}