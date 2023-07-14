<?php

declare(strict_types=1);

class DefaultConnection
{
    //variaveis de ambiente
    public const HOST = 'localhost';
    public const USER = 'alessandro';
    public const PASS = 'livre';
    public const DB = 'db_ifood';

    public function abrir(): \PDO
    {
        $conexao = new \PDO(
            'mysql:host=' . self::HOST . ';dbname=' . self::DB,
            self::USER,
            self::PASS
        );

        return $conexao;
    }
}

