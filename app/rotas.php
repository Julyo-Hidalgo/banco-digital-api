<?php

use App\Controller\correntistaController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url){
    //correntista
    case '/correntista/save':
        correntistaController::save();
    break;
    case '/correntista/entrar':
        correntistaController::login();
    break;

    //conta
    case '/conta/pix/save':
    break;
    
    default:
        http_response_code(403);
    break;
}