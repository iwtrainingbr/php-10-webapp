<?php

declare(strict_types=1);

namespace App\Model;
use App\Connection\DefaultConnection;

class Usuario extends AbstractModel implements ModelInterface
{
    public const TABLE = 'tb_usuario';

    private int $id;
    private string $nome;
    private string $email;
    private string $senha;

    public function getId(): int
    {
        return $this->id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = ucwords(strtolower($nome));
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = str_replace(' ', '', strtolower($email));
    }

    public function setSenha(string $senha): void
    {
        $this->senha = password_hash($senha, PASSWORD_ARGON2I);
    }

    public static function all(): array
    {
        return parent::select(self::TABLE);
    }

    public function save(): void
    {
        $table = self::TABLE;

        $today = date('Y-m-d H:i:s');

        $result = parent::db()->prepare(
            "INSERT INTO {$table} (nome, email, senha, criado_em) 
            VALUES ('{$this->nome}', '{$this->email}', '{$this->senha}', '{$today}')"
        );
        $result->execute();
    }

    public static function count(): int
    {
        return 0;
    }

    public static function findOne(): object
    {
        return new \stdClass();
    } 

    public static function remove(int $id): void
    {

    }

    public function update(): void
    {

    }
}






