<?php

namespace App\DAO;

use App\Model\contaModel;
use App\Model\correntistaModel;
use App\Model\model;
use PDO;

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

    public function selectByCpfAndSenha($cpf, $senha) : contaModel{
        $sql = "SELECT tipo, numero, ct.senha, id_correntista, limite, SUM(saldo) AS saldo FROM conta AS ct JOIN correntista ON ct.id_correntista = correntista.id WHERE correntista.cpf = ? AND correntista.senha = ? GROUP BY ct.id_correntista";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $cpf);
        $stmt->bindValue(2, $senha);
        $stmt->execute();
        
        $obj = $stmt->fetchAll(PDO::FETCH_CLASS, "\App\Model\contaModel");
        
        return is_object($obj[0]) ? $obj[0] : new contaModel();
    }
}