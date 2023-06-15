<?php

namespace App\DAO;

use App\Model\correntistaModel;

class correntistaDAO extends dao{
    public function __construct(){
        parent::__construct();
    }

    public function insert(correntistaModel $model) : bool{
        $sql = "insert into correntista (nome, cpf, data_nasc, senha) values (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->data_nasc);
        $stmt->bindValue(4, $model->senha);
        return $stmt->execute();
    }

    public function update(correntistaModel $model) : bool{
        return 1;
    }

    public function selectByCpfAndSenha($cpf, $senha) : correntistaModel{
        $sql = "select * from correntista where cpf = ? and senha = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $cpf);
        $stmt->bindValue(2, $senha);
        $stmt->execute();

        $obj = $stmt->fetchObject("model\correntistaModel.php");
        
        return  is_object($obj)  ? $obj : new correntistaModel();
    }
}