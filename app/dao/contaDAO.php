<?php

namespace App\DAO;

use App\Model\contaModel;
use PDO;

class contaDAO extends dao{
    public function __construct(){
        parent::__construct();
    }

    public function insert(contaModel $model)
    {
        $sql = "insert into conta (tipo, numero, senha, id_correntista, limite, saldo) values (?, ?, ?, ?, ?, ?)";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $model->tipo);
        $stmt->bindValue(2, $model->numero);
        $stmt->bindValue(3, $model->senha);
        $stmt->bindValue(4, $model->id_correntista);
        $stmt->bindValue(5, $model->limite);
        $stmt->bindValue(6, $model->saldo);
        $stmt->execute();
    }

    public function selectByChavePix($chavePix)
    {
        $sql = "SELECT id FROM conta as co JOIN chave_pix as ch.id_conta = co.id ON id_conta  where = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $chavePix);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectByAccountNumber($accountNumber)
    {
        $sql = "SELECT co.id FROM conta AS co JOIN chave_pix AS ch ON ch.id_conta = co.id WHERE co.numero = ?";

        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue(1, $accountNumber);
        $stmt->execute();
        $teste = $stmt->fetchObject('App\Model\model');
        return $teste;
    }
}