<?php

use App\Controller\chavePixController;
use App\Controller\correntistaController;
use App\Controller\transacaoController;

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
    case '/conta/searchByChavePix':
        contaController::searchByChavePix();
    break;

    //chave pix
    case '/conta/pix/save':
        chavePixController::save();
    break;

    //transação
    case '/transacao/save':
        transacaoController::save();
    break;
    
    //associação transação e correntista
    case '/transacaoCorrentistaAssoc/save':
        transacao_correntista_assocController::save();
    break;

    default:
        http_response_code(403);
    break;
}