<?php

namespace App\Controller;

abstract class controller{
    public static function getResponseAsJSON($dado){
        header("Content-type: application/json; charset=utf-8");
        header("Cache-Control: no-cache, must-revalidate");
        header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
        header("Pragma: public");
        
        exit(json_encode($dado));
    }

    protected static function fillModel(object $model, object $objectToFill): void{
        foreach ((get_object_vars($objectToFill)) as $key => $value):
            //$key => $value: separa cada variável em chave e valor, utilizando o operador de vetores "=>"

            //Nome do atributo do objeto model que receberá o seu respectivo valor
            $attributeName = strtolower($key);

            if (property_exists($model, $attributeName))
            {
                $model->$attributeName = $value;
            }
        endforeach;
    }

    public static function getDataFromRequest()
    {
        return json_decode(file_get_contents("php://input"));
    }

}