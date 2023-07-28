<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Restaurante;

class RestauranteController extends AbstractController
{
    public function list(): void
    {
        $this->load('restaurante/listar', Restaurante::all()); 
    }

    public function edit(): void
    {
        $id = (int)$_GET['id'];

        if (!empty($_POST)) {
            Restaurante::update($id, $_POST['nome'], $_POST['endereco']);

            header('location: /restaurantes');
        }

        $dados = Restaurante::findOne($id); 

        $this->load('restaurante/edit', $dados);
    }

    public function add(): void
    {
        //se o form ja tiver sido preenchido
        if (!empty($_POST)) {
            $rest = new Restaurante(
                $_POST['nome'],
                $_POST['endereco']
            );
            
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