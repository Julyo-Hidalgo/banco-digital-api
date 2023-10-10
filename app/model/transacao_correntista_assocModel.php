<?php

namespace App\Model;

use App\DAO\transacao_correntista_assocDAO;

class transacao_correntista_assocModel extends model
{
    public $id_conta_remetente, $id_conta_destinatario, $id_transacao;

    public function save() : bool
    {
        return (new transacao_correntista_assocDAO())->insert($this);
    }
}