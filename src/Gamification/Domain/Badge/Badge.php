<?php

namespace Alura\Architecture\Gamification\Domain\Badge;

use Alura\Architecture\Shared\Domain\Cpf;

class Badge
{
    private Cpf $studentCpf;
    private string $name;

    public function __construct(Cpf $studentCpf, string $name)
    {
        $this->studentCpf = $studentCpf;
        $this->name = $name;
    }

    public function studentCpf(): Cpf
    {
        return $this->studentCpf;
    }

    public function __toString(): string
    {
        return $this->name;
    }
}
