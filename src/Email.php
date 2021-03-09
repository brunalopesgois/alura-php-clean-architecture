<?php

namespace Alura\Arquitetura;

use InvalidArgumentException;

class Email
{
    private string $address;

    public function __construct(string $address)
    {
        if (filter_var($address, FILTER_VALIDATE_EMAIL === false)) {
            throw new InvalidArgumentException("E-mail inválido");
        }

        $this->address = $address;
    }

    public function __toString(): string
    {
        return $this->address;
    }
}
