<?php

declare(strict_types=1);

abstract class AbstractController
{
    public function load(string $view): void
    {
        include "../src/views/_template/head.phtml";
        
        include "../src/views/_components/menu.phtml"; 
        include "../src/views/{$view}.phtml";

        include "../src/views/_template/footer.phtml";
    }
}

