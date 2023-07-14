<?php

declare(strict_types=1);

class RestauranteController extends AbstractController
{
    public function list(): void
    {
        //preparando a consulta
        $resultado = $this->conexao()->prepare('SELECT * FROM tb_restaurante');

        //executando a consulta
        $resultado->execute();

        //pegando os dados encontrados
        $restaurantes = $resultado->fetchAll();

        $this->load('restaurante/listar', $restaurantes);
    }

    public function add(): void
    {
        echo "Pagina de cadastro ";
    }
}