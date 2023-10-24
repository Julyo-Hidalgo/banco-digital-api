<?php

namespace App\Controller;

use App\Model\chavePixModel;

class chavePixController extends controller{
    public static function save(){
        $data = parent::getDataFromRequest();

        $model = new chavePixModel();
        parent::fillModel($model, $data);
        parent::getResponseAsJSON($model->save());
    }
}