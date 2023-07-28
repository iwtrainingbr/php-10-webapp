<?php

ini_set('display_errors', 1);

include '../vendor/autoload.php';

use App\Controller\InicioController;
use App\Controller\ProdutoController;
use App\Controller\RestauranteController;
use App\Controller\Api\RestauranteApiController;

//route
$url = explode('?', $_SERVER['REQUEST_URI'])[0];

//router
echo match($url) {
    '/' => (new InicioController)->list(),
    '/restaurantes' => (new RestauranteController)->list(),
    '/restaurantes/cadastro' => (new RestauranteController)->add(), 
    '/restaurantes/excluir' => (new RestauranteController)->remove(),
    '/restaurantes/editar' => (new RestauranteController)->edit(),
    '/produtos' => (new ProdutoController)->list(),
    '/produtos/excluir' => (new ProdutoController)->remove(),
    '/contato' => load('contato'),


    //API
    '/api/restaurantes' => (new RestauranteApiController)->getAll(),
    '/api/restaurante' => (new RestauranteApiController)->getOne(),
    '/api/restaurantes/add' => (new RestauranteApiController)->save(),

    default => load('erro'),
};

function load(string $view): void
{
    include "../src/views/_template/head.phtml";
    
    include "../src/views/_components/menu.phtml";
    include "../src/views/{$view}.phtml";

    include "../src/views/_template/footer.phtml";
}