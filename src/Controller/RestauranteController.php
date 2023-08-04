<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Restaurante;
use Dompdf\Dompdf;

class RestauranteController extends AbstractController
{
    public function pdf(): void
    {
        $dados = "";

        $todos = Restaurante::all(); //[A, B, C, D, E]
        foreach ($todos as $cada) {
            $dados .= "
                <tr>
                    <td>{$cada['id']}</td>
                    <td>{$cada['nome']}</td>
                    <td>{$cada['endereco']}</td>
                </tr>
            ";  
        }

        $pdf = new Dompdf();
        $pdf->loadHtml("
            <style>
                .table-dark {
                    background-color: #333333;
                    color: #FFFFFF;
                }
            </style>

            <h1>Lista de Restaurantes: " . Restaurante::count() . " </h1>

            <table class='table table-striped table-hover mt-3'>
                <thead class='table-dark'>
                    <tr>
                        <th>#ID</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                    </tr>
                </thead>
                <tbody>
                    {$dados}
                </tbody>
            </table>
        ");

        $pdf->render();

        $pdf->stream('restaurantes.pdf', [
            'Attachment' => false,
        ]);
    }

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