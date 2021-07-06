<?php

namespace Alura\Architecture\Shared\Domain;

use InvalidArgumentException;

class Cpf
{
    private string $number;

    public function __construct(string $number)
    {
        $this->setNumber($number);
    }

    private function setNumber($number)
    {
        $options = [
            'options' => [
                'regexp' => '/\d{3}.\d{3}.\d{3}-\d{2}/'
            ]
        ];

        if (filter_var($number, FILTER_VALIDATE_REGEXP, $options) === false) {
            throw new InvalidArgumentException("CPF inválido");
        }

        $this->number = $number;
    }
    
    public function __toString(): string
    {
        return $this->number;
    }
}
