<?php

namespace App\DAO;

use App\Model\transacaoModel;

class transacaoDAO extends dao{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(transacaoModel $model) : bool
    {
        $sql = "INSERT INTO transacao_correntista_assoc (valor) VALUES (?, ?)";
        
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->valor);
        $response = $stmt->execute();

        $model->id = $this->conexao->lastInsertId();
        
        return $response;
    }
}