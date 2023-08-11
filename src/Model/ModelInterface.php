<?php

declare(strict_types=1);

namespace App\Model;

interface ModelInterface
{
    public static function all(): array;

    public static function count(): int;

    public function save():  void;

    public static function findOne(): object;

    public function update(): void;

    public static function remove(int $id): void;
}