<?php
require('vendor/autoload.php');
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require 'app/views/index.php';
        break;
    case '' :
        require 'app/views/index.php';
        break;
    case '/devedores' :
        require 'app/views/devedores/index.php';
        break;
    case '/devedores/adicionar':
        require 'app/views/devedores/create.php';
        break;
    case '/devedores/pesquisa':
        require 'app/views/devedores/view.php';
        break;
    case '/dash/joves':
        require 'app/views/dash/jovens.php';
        break;
    case '/dash/maiores':
        require 'app/views/dash/maiores.php';
        break;
    case '/dash/ocorrencias':
        require 'app/views/dash/ocorrencias.php';
        break;
    case '/dash/vencimento':
        require 'app/views/dash/vencimento.php';
        break;
    default:
        http_response_code(404);
        require '404.php';
        break;
}
