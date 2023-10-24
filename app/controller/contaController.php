<?php

use App\Controller\controller;
use App\Model\contaModel;

class contaController extends controller
{

    public static function searchByChavePix() : void
    {
        $chavePix = parent::getDataFromRequest();

        parent::getResponseAsJSON((new contaModel())->getByChavePix($chavePix));
    }
}