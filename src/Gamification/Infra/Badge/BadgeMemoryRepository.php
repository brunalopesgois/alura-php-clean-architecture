<?php

namespace Alura\Architecture\Gamification\Infra\Badge;

use Alura\Architecture\Gamification\Domain\Badge\Badge;
use Alura\Architecture\Gamification\Domain\Badge\BadgeRepository;
use Alura\Architecture\Shared\Domain\Cpf;

class BadgeMemoryRepository implements BadgeRepository
{
    private array $badges;
    
    public function add(Badge $badge): void
    {
        $this->badges[] = $badge;
    }

    public function studentBadgesWithCpf(Cpf $cpf): array
    {
        return array_filter($this->badges, fn (Badge $badge) => $badge->studentCpf() == $cpf);
    }
}
