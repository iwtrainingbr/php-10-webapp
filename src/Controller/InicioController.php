<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Restaurante;
use App\Model\Produto;

class InicioController extends AbstractController
{
    public function list(): void
    {
        $dados = [
            'clientes' => 700,
            'restaurantes' => Restaurante::count(),
            'produtos' => Produto::count(),
        ];

        $this->load('inicio/list', $dados);
    }
}