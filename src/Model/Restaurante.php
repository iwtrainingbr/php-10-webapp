<?php

declare(strict_types=1);

namespace App\Model;

use App\Connection\DefaultConnection;

class Restaurante extends AbstractModel
{
    public const TABLE = 'tb_restaurante';

    private string $nome;
    private string $endereco;

    public function __construct(string $nome, string $endereco)
    {
        $this->nome = strip_tags($nome);
        $this->endereco = strip_tags($endereco);
    }

    public static function count(): int
    {
        return parent::qtd(self::TABLE);
    }

    public static function all(): array
    {
        return parent::select(self::TABLE);
    }

    public static function findOne(int $id): array
    {
        return parent::find(self::TABLE, $id);
    }

    public function save(): void
    {
        $con = (new DefaultConnection())->abrir();
        
        $result = $con->prepare("
            INSERT INTO tb_restaurante (nome, endereco) 
            VALUES (:nome, :endereco)
        ");
        $result->execute([
            ':nome' => $this->nome, //limpar os sql injection
            ':endereco' => $this->endereco,
        ]);
    }

    public static function update(int $id, string $nome, string $endereco): void
    {
        $con = (new DefaultConnection())->abrir();

        $result = $con->prepare("
            UPDATE tb_restaurante SET nome=:nome, endereco=:endereco'
            WHERE id={$id}
        ");
        $result->execute([
            ':nome' => $nome,
            ':endereco' => $endereco,
        ]);
    }

    public static function remove(int $id): void
    {
        parent::delete(self::TABLE, $id);
    }
}



