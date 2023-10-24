<?php

namespace App\Model;

use App\DAO\transacao_correntista_assocDAO;
use App\DAO\transacaoDAO;

class transacaoModel extends model{
    public $id, $valor, $data_transacao;

    public function save(transacao_correntista_assocModel $transacaoCorrentistaAssoc) : bool
    {
        
        $response = (new transacaoDAO())->insert($this);

        $transacaoCorrentistaAssoc->id_transacao = $this->id;
        $response += (new transacao_correntista_assocDAO())->insert($transacaoCorrentistaAssoc);
        
        return $response;
    }
}