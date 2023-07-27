<?php

declare(strict_types=1);

class Restaurante extends AbstractModel
{
    public const TABLE = 'tb_restaurante';

    public string $nome;
    public string $endereco;

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
            VALUES ('{$this->nome}', '{$this->endereco}')
        ");
        $result->execute();
    }

    public static function update(int $id, string $nome, string $endereco): void
    {
        $con = (new DefaultConnection())->abrir();

        $result = $con->prepare("
            UPDATE tb_restaurante SET nome='{$nome}', endereco='{$endereco}'
            WHERE id={$id}
        ");
        $result->execute();
    }

    public static function remove(int $id): void
    {
        parent::delete(self::TABLE, $id);
    }
}



