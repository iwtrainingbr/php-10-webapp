<?php

ini_set('display_errors', 1);

//route
$url = $_SERVER['REQUEST_URI'];

include '../src/Controller/AbstractController.php';
include '../src/Controller/RestauranteController.php';
include '../src/Controller/ProdutoController.php';

//router
echo match($url) {
    '/' => load('inicio'),
    '/restaurantes' => (new RestauranteController)->list(),
    '/restaurantes/novo' => (new RestauranteController)->add(), 
    '/produtos' => (new ProdutoController)->list(),
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