<?php

namespace Alura\Architecture\Academic\Domain\Student;

use InvalidArgumentException;

class Phone
{
    private string $ddd;
    private string $number;

    public function __construct(string $ddd, string $number)
    {
        if (preg_match('/\d{2}/', $ddd, $matches) !== 1) {
            throw new InvalidArgumentException("DDD inválido");
        }

        if (preg_match('/\d{8,9}/', $number, $matches) !== 1) {
            throw new InvalidArgumentException("Número de telefone inválido");
        }

        $this->ddd = $ddd;
        $this->number = $number;
    }

    public function __toString(): string
    {
        return "({$this->ddd}) {$this->number}";
    }

    public function ddd(): string
    {
        return $this->ddd;
    }

    public function number(): string
    {
        return $this->number;
    }
}
