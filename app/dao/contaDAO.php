<?php

namespace App\DAO;

use App\Model\contaModel;

class contaDAO extends dao{
    public function __construct(){
        parent::__construct();
    }

    public function insert(contaModel $model) : bool{
        $sql = "insert into correntista (tipo, numero, senha, id_correntista) values (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->tipo);
        $stmt->bindValue(2, $model->numero);
        $stmt->bindValue(3, $model->senha);
        $stmt->bindValue(4, $model->id_correntista);
        return $stmt->execute();
    }
}