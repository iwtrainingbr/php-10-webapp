<?php

declare(strict_types=1);

class Pessoa 
{
    public string $nome;
    private int $idade;

    public function setIdade(int $idade): void
    {
        if ($idade < 0) {
            die('Idade invalida');
        }

        $this->idade = $idade;
    }

    public function getIdade(): int
    {
        return $this->idade;
    }
}

$p = new Pessoa();
$p->nome = 'Joao Victor';
// $p->idade = -23;
$p->setIdade(-23);

echo $p->nome." tem ".$p->getIdade();