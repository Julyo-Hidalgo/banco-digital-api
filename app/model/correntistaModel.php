<?php

namespace App\Model;

use App\DAO\contaDAO;
use App\DAO\correntistaDAO;

class correntistaModel extends model{
    public $id, $nome, $cpf, $data_nasc, $senha;

    public function save(){
        if($this->id == null){
            (new correntistaDAO())->insert($this);
            
            $conta = new contaDAO();
            
        }else
            (new correntistaDAO())->update($this);
    }

    public function getByCpfAndSenha($cpf, $senha) : correntistaModel{
        return ((new correntistaDAO())->selectByCpfAndSenha($cpf, $senha));
    }
}