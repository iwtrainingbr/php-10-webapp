<?php

declare(strict_types=1);

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