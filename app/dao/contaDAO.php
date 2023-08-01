<?php

namespace App\DAO;

use App\Model\contaModel;

class contaDAO extends dao{
    public function __construct(){
        parent::__construct();
    }

    public function insert(contaModel $model) : bool{
        $sql = "insert into conta (tipo, numero, senha, id_correntista, limite, saldo) values (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->tipo);
        $stmt->bindValue(2, $model->numero);
        $stmt->bindValue(3, $model->senha);
        $stmt->bindValue(4, $model->id_correntista);
        $stmt->bindValue(5, $model->limite);
        $stmt->bindValue(6, $model->saldo);
        return $stmt->execute();
    }
}