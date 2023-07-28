<?php

declare(strict_types=1);

namespace App\Controller\Api;

use App\Model\Restaurante;

class RestauranteApiController
{
    public function getAll(): void
    {
        $dados = Restaurante::all();

        echo json_encode($dados);
    }

    public function getOne(): void
    {
        $id = (int)$_GET['id'];

        echo json_encode(
            Restaurante::findOne($id)
        );
    }

    public function save(): void
    {
        $dados = json_decode(
            file_get_contents('php://input')
        );

        $novo = new Restaurante(
            $dados->nome,
            $dados->endereco
        );
        
        $novo->save();

        echo json_encode($dados);
    }
}