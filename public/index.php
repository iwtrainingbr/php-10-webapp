<?php

ini_set('display_errors', 1);

//route
$url = explode('?', $_SERVER['REQUEST_URI'])[0];
//composer:autoload
include '../src/Controller/AbstractController.php';
include '../src/Controller/RestauranteController.php';
include '../src/Controller/ProdutoController.php';
include '../src/Controller/InicioController.php';
include '../src/Connection/DefaultConnection.php';
include '../src/Model/AbstractModel.php';
include '../src/Model/Produto.php';
include '../src/Model/Restaurante.php';

//router
echo match($url) {
    '/' => (new InicioController)->list(),
    '/restaurantes' => (new RestauranteController)->list(),
    '/restaurantes/cadastro' => (new RestauranteController)->add(), 
    '/restaurantes/excluir' => (new RestauranteController)->remove(),
    '/produtos' => (new ProdutoController)->list(),
    '/produtos/excluir' => (new ProdutoController)->remove(),
    '/contato' => load('contato'),
    default => load('erro'),
};

function load(string $view): void
{
    include "../src/views/_template/head.phtml";
    
    include "../src/views/_components/menu.phtml";
    include "../src/views/{$view}.phtml";

    include "../src/views/_template/footer.phtml";
}