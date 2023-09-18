<?php

namespace App\Model;

use App\DAO\contaDAO;
use App\DAO\correntistaDAO;

class correntistaModel extends model{
    public $id, $nome, $cpf, $data_nasc, $senha;

    public function save(){
        if($this->id == null){
            (new correntistaDAO())->insert($this);
            
            if ($this->id <> null){
                $number = 0007 + rand(1000000, 9999999);

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
            }
        }else{
            (new correntistaDAO())->update($this);
        }
    }

    public function getByCpfAndSenha($cpf, $senha) : contaModel
    {
        return ((new correntistaDAO())->selectByCpfAndSenha($cpf, $senha));
    }
}