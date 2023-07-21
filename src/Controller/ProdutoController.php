<?php

declare(strict_types=1);

class ProdutoController extends AbstractController
{
    public function list(): void
    {
        $this->load('produto/listar', Produto::all());
    }

    public function add(): void
    {
        echo "Pagina de cadastro ";
    }

    public function remove(): void
    {
        $id = $_GET['id'];

        $this
            ->conexao()
            ->prepare("DELETE FROM tb_produto WHERE id='{$id}'")
            ->execute();

        header('location: /produtos');
    }
}

