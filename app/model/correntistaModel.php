<?php

namespace App\Model;

use App\DAO\contaDAO;
use App\DAO\correntistaDAO;

class correntistaModel extends model{
    public $id, $nome, $cpf, $data_nasc, $senha;

    public function save(){
        if($this->id == null){
            (new correntistaDAO())->insert($this);
            
            $number = 0007 + range(10000000000, 99999999999, 1);

            $conta = new contaModel();
            $conta->tipo = "C";
            $conta->numero = $number;
            $conta->senha = $this->senha;
            $conta->id_correntista = $this->id;
            $conta->limite = 0;
            $conta->saldo = 0;
            $conta->save();
            
            $conta->tipo = "P";
            $conta->numero = $number;
            $conta->senha = $this->senha;
            $conta->id_correntista = $this->id;
            $conta->limite = 3000;
            $conta->saldo = 300;
            $conta->save();
        }else
            (new correntistaDAO())->update($this);
    }

    public function getByCpfAndSenha($cpf, $senha) : correntistaModel{
        return ((new correntistaDAO())->selectByCpfAndSenha($cpf, $senha));
    }
}