<?php

declare(strict_types=1);

class RestauranteController extends AbstractController
{
    public function list(): void
    {
        $this->load('restaurante/listar', Restaurante::all()); 
    }

    public function add(): void
    {
        //se o form ja tiver sido preenchido
        if (!empty($_POST)) {
            $rest = new Restaurante();
            $rest->nome = $_POST['nome'];
            $rest->endereco = $_POST['endereco'];
            
            $rest->save();

            header('location: /restaurantes');
        }

        $this->load('restaurante/add');
    }

    public function remove(): void
    {
        Restaurante::remove( (int) $_GET['id']);

        header('location: /restaurantes');
    }
}