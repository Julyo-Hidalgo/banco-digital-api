<?php

namespace App\DAO;

use App\Model\chavePixModel;

class chavePixDAO extends dao
{

    public function insert(chavePixModel $model) : bool{
        $sql = "insert into chave_pix (chave, tipo, id_conta) values (?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->chave);
        $stmt->bindValue(2, $model->tipo);
        $stmt->bindValue(3, $model->id_conta);
        return $stmt->execute();
    }
}