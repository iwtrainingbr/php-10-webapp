<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\Usuario;

class UsuarioController extends AbstractController
{
    public function list(): void
    {
        $this->load('usuario/list', Usuario::all());
    }

    public function add(): void
    {
        if (empty($_POST)) {
            $this->load('usuario/add');
            return;
        }

        $usuario = new Usuario();
        $usuario->setNome($_POST['nome']);
        $usuario->setEmail($_POST['email']);
        $usuario->setSenha($_POST['senha']);

        $usuario->save();

        header('location: /usuarios');
    }
}