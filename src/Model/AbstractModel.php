<?php

declare(strict_types=1);

namespace App\Model;

use App\Connection\DefaultConnection;
use PDO;

abstract class AbstractModel
{
    public static function db(): PDO
    {
        return (new DefaultConnection)->abrir();
    }

    public static function qtd(string $table): int
    {
        $resultado = self::db()->prepare("SELECT COUNT(*) AS qtd FROM {$table}");
        $resultado->execute();

        return $resultado->fetch()['qtd'];
    }

    public static function select(string $table): array
    {
        $resultado = self::db()->prepare("SELECT * FROM {$table}");
        $resultado->execute();

        return $resultado->fetchAll();
    }

    public static function find(string $table, int $id): array
    {
        $con = (new DefaultConnection)->abrir();

        $result = $con->prepare("SELECT * FROM {$table} WHERE id={$id}");
        $result->execute();

        return $result->fetch();
    }

    public static function delete(string $table, int $id): void
    {
        $con = (new DefaultConnection)->abrir();

        $result = $con->prepare("DELETE FROM {$table} WHERE id={$id}");
        $result->execute();
    }
}
