<?php

declare(strict_types=1);

namespace App\Controller;

use App\Connection\DefaultConnection;

abstract class AbstractController
{
    public function load(string $view, array $dados = [], bool $exibirMenu = true): void
    {
        include "../src/views/_template/head.phtml";
        
        $exibirMenu && include "../src/views/_components/menu.phtml"; 
        
        include "../src/views/{$view}.phtml";

        include "../src/views/_template/footer.phtml";
    }

    public function conexao (): \PDO
    {
        return (new DefaultConnection)->abrir();
    }
}

