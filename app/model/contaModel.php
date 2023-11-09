<?php

namespace App\Model;

use App\DAO\contaDAO;

class contaModel extends model{
    public $id, $tipo, $numero, $senha, $id_correntista, $limite, $saldo, $data_abertura;

    public function save(){
        $dao = new contaDAO();
        
        $dao->insert($this);
    }

    public function getByChavePix($chavePix)
    {

        return (new contaDAO())->selectByChavePix($chavePix);

    }

    public function getByAccountNumber($accountNumber)
    {
        return (new contaDAO())->selectByAccountNumber($accountNumber);
    }
}