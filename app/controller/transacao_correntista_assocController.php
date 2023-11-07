<?php

use App\Controller\controller;
use App\Model\transacao_correntista_assocModel;

class transacao_correntista_assocController extends controller 
{
    public static function save()
    {
        $data = parent::getDataFromRequest();

        $model = new transacao_correntista_assocModel();
        parent::fillModel($model, $data);

        parent::getResponseAsJSON($model->save());
    }
}