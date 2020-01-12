<?php

// Router File 

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
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            // Botão pesquisar navbar
            if(isset($_POST['pesquisa'])){
                require 'app/views/devedores/index.php';
            }
            // Modal Cadastro de Devedor
            elseif(isset($_POST['adiciona'])){
                require 'app/views/devedores/index.php';
            }
            // Ver dívidas e Edit de Devedor
            elseif(isset($_POST['view'])){
                require 'app/views/devedores/view.php';
            }
            // Deletar Devedor e suas respectivas Dívidas [Controlador]
            elseif(isset($_POST['deleta'])){
                require 'app/views/devedores/delete.php';
            }
            // Update de Devedor [Controlador]
            elseif(isset($_POST['atualiza'])){
                require 'app/views/devedores/update.php';
            }
            // Erro de Handler Request
            else{
                http_response_code(404);
                require '404.php';
                break;
            }
        }else{
            // GET devedores => Return All()
            require 'app/views/devedores/index.php';
        }
        break;
    case '/dividas':
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            // Adicionar Nova Dívida
            if(isset($_POST['adiciona'])){
                require 'app/views/dividas/index.php';
            }
            // View de única dívida, edit e delete
            elseif(isset($_POST['view'])){
                require 'app/views/dividas/view.php';
            }
            // Deletar Dívida [Controlador]
            elseif(isset($_POST['deleta'])){
                require 'app/views/devedores/delete.php';
            }
            // Update de Dívida [Controlador]
            elseif(isset($_POST['atualiza'])){
                require 'app/views/devedores/update.php';
            }else{
                http_response_code(404);
                require '404.php';
                break;
            }
        }else{
            require 'app/views/devedores/index.php';
        }
        break;
    case '/jovens':
        require 'app/views/dash/jovens.php';
        break;
    case '/maiores':
        require 'app/views/dash/maiores.php';
        break;
    case '/ocorrencias':
        require 'app/views/dash/ocorrencias.php';
        break;
    case '/vencimento':
        require 'app/views/dash/vencimento.php';
        break;
    default:
        http_response_code(404);
        require '404.php';
        break;
}
