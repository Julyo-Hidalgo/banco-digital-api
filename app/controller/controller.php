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
}