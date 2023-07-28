<?php

declare(strict_types=1);

namespace App\Model;

class Produto extends AbstractModel
{
    public static function count(): int
    {
        return parent::qtd('tb_produto');
    }

    public static function all(): array
    {
        return parent::select('tb_produto');
    }
    
}




