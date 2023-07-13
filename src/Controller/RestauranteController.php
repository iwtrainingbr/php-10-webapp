<?php

declare(strict_types=1);

class RestauranteController extends AbstractController
{
    public function list(): void
    {
        $this->load('restaurante/listar');
    }

    public function add(): void
    {
        echo "Pagina de cadastro ";
    }
}