<?php

namespace App\DAO;

use App\Model\transacao_correntista_assocModel;

class transacao_correntista_assocDAO extends dao
{

    public function insert(transacao_correntista_assocModel $model) : bool
    {
        $sql = "INSERT INTO transacao_correntista_assoc (id_conta_remetente, id_conta_destinatario, id_transacao) VALUES (?, ?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->id_conta_remetente);
        $stmt->bindValue(2, $model->id_conta_destinatario);
        $stmt->bindValue(3, $model->id_transacao);
        return $stmt->execute();
    }

}