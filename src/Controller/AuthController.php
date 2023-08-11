<?php

declare(strict_types=1);

namespace App\Controller;

use App\Model\AbstractModel;
use App\Security\AuthSecurity;

class AuthController extends AbstractController
{
    public function login(): void
    {
        if ($_POST) {
            $result = AbstractModel::db()->prepare(
                "SELECT * FROM tb_usuario WHERE email='{$_POST['email']}'"
            );
            $result->execute();

            $dados = $result->fetchObject();

            if ($dados === false) {
                echo "Usuario nao encontrado";
                return;
            }

            if (password_verify($_POST['senha'], $dados->senha) === false) {
                echo "Senha incorreta";
                return;
            }

            //se chegou aqui é pq logou
            $today = date('Y-m-d H:i:s');
            AbstractModel::db()->prepare(
                "UPDATE tb_usuario SET ultimo_login='{$today}' WHERE id='{$dados->id}'"
            )->execute();

            AuthSecurity::setUser($dados->nome);
            header('location: /');
        }

        $this->load('auth/login', exibirMenu: false);
    }

    public function logout(): void
    {
        AuthSecurity::disconnect();
        header('location: /');
    }
}