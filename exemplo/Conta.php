<?php

class Conta
{
    private float $saldo = 0;

    public function deposito(float $valor): void
    {
        $this->saldo += $valor;
    }

    public function saque(float $valor): void
    {
        if ($valor > $this->saldo) {
            die('Saldo insuficiente');
        }

        $this->saldo -= $valor;
    }

    public function pegarSaldo(): float
    {
        return $this->saldo;
    }
}

$contaAudirio = new Conta();
$contaAudirio->deposito(1234.56);

$contaAudirio->deposito(123.12);

$contaAudirio->saque(1200);

echo $contaAudirio->pegarSaldo();