<?php

namespace App\Controller;

use App\Model\transacao_correntista_assocModel;
use App\Model\transacaoModel;

class transacaoController extends controller{
    public static function save(){
        $data = parent::getDataFromRequest();

        $transacao = new transacaoModel();
        $transacaoCorrentistaAssoc = new transacao_correntista_assocModel;

        parent::fillModel($transacao, $data);
        parent::fillModel($transacaoCorrentistaAssoc, $data);

        parent::getResponseAsJSON($transacao->save($transacaoCorrentistaAssoc));
    }
}