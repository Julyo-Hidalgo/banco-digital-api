<?php

use App\Controller\correntistaController;

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch($url){
    case '/correntista/save':
        correntistaController::save();
    break;
    case '/correntista/entrar':
        correntistaController::login();
    break;
    case '/conta/pix/enviar':

    break;
    default:
        http_response_code(403);
    break;
}