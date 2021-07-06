<?php

namespace Alura\Architecture\Gamification\App\FindUserBadge;

class FindUserBadgeDto
{
    public string $studentCpf;

    public function __construct(string $studentCpf)
    {
        $this->studentCpf = $studentCpf;
    }
}
