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
                $conta = new contaModel();
                $conta->tipo = "C";
                $conta->numero = $this->generateAccountNumber();
                $conta->senha = $this->senha;
                $conta->id_correntista = $this->id;
                $conta->limite = 0;
                $conta->saldo = 0;
                $conta->save();
                
                $conta->tipo = "P";
                $conta->numero = $this->generateAccountNumber();
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

    public function generateAccountNumber() : string
    {
        $bankNumber = "0007";
        $RandomNumber = strval(rand(1000000, 9999999));
        $number = $bankNumber . $RandomNumber;
        $this->validateAccountNumber($number);

        return $number;
    }

    public function validateAccountNumber($number) : void
    {
        $alreadyExist = (new contaModel())->getByAccountNumber($number);

        if ($alreadyExist == true) $this->generateAccountNumber();
    }
}