<?php

declare(strict_types=1);

namespace App\Controller;

use App\Security\AuthSecurity;

class AuthController extends AbstractController
{
    public function login(): void
    {
        if ($_POST) {
            //SELECT * FROM tb_usuario WHERE email='{$_POST['email']}}'
            if ($_POST['email'] === 'samuel@email.com') {
                AuthSecurity::setUser('Samuel');
                header('location: /');
            } else {
                echo "Email ou senha invalidos";
            }
        }

        $this->load('auth/login', exibirMenu: false);
    }

    public function logout(): void
    {
        AuthSecurity::disconnect();
        header('location: /');
    }
}