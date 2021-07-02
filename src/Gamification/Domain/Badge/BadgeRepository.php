<?php

namespace Alura\Architecture\Gamification\Domain\Badge;

use Alura\Architecture\Academic\Domain\Cpf;

interface BadgeRepository
{
    public function add(Badge $badge): void;

    public function studentBadgesWithCpf(Cpf $cpf);
}
