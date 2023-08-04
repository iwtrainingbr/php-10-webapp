<?php

declare(strict_types=1);

namespace App\Security;

class AuthSecurity
{
    public static function getUser(): array|null
    {
        return $_SESSION['user'] ?? null;
    }

    public static function setUser(string $name): void
    {
        $_SESSION['user'] = [
            'name' => $name,
        ];
    }

    public static function disconnect(): void
    {
        session_destroy();
    }
}
