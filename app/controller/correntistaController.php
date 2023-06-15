<?php

namespace App\Controller;

use App\Model\correntistaModel;

class  correntistaController extends controller{
    public static function save() : void{
        $json_obj = json_decode(file_get_contents('php://input'));
        
        $model = new correntistaModel();
        $model->nome = $json_obj->nome;
        $model->cpf = $json_obj->cpf;
        $model->data_nasc = $json_obj->data_nasc;
        $model->senha = $json_obj->senha;

        parent::getResponseAsJSON($model->save());
    }

    public static function login(){
        $json_obj = json_decode(file_get_contents('php://input'));
        
        $model = new correntistaModel();

        parent::getResponseAsJSON($model->getByCpfAndSenha($json_obj->cpf, $json_obj->senha));
    }
}