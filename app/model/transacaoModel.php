<?php

namespace App\Model;

use App\DAO\transacaoDAO;

class transacaoModel extends model{
    public $id, $valor, $data_transacao;

    public function save() : bool
    {
        return (new transacaoDAO())->insert($this);
    }
}