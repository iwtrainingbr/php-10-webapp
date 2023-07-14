<?php

declare(strict_types=1);

class InicioController extends AbstractController
{
    public function list(): void
    {
        $dados = [
            'clientes' => 700,
            'restaurantes' => 12,
            'pedidos' => 70,
        ];

        $this->load('inicio/list', $dados);
    }
}