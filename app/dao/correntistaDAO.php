<?php

namespace App\DAO;

use App\Model\correntistaModel;

class correntistaDAO extends dao{
    public function __construct(){
        parent::__construct();
    }

    public function insert(correntistaModel $model) : ?correntistaModel{
        $sql = "insert into correntista (nome, cpf, data_nasc, senha) values (?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->data_nasc);
        $stmt->bindValue(4, $model->senha);
        $stmt->execute();

        $model->id = $this->conexao->lastInsertId();
        
        return $model;
    }

    public function update(correntistaModel $model) : bool{
        return 1;
    }

    public function selectByCpfAndSenha($cpf, $senha) : correntistaModel{
        $sql = "SELECT * FROM correntista where cpf = ? and senha = ? ";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $cpf);
        $stmt->bindValue(2, $senha);
        $stmt->execute();
        
        $obj = $stmt->fetchObject("App\Model\correntistaModel");

        return is_object($obj) ? $obj : new correntistaModel();
    }
}