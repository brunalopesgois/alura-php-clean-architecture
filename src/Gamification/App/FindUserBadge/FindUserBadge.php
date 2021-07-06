<?php

namespace Alura\Architecture\Gamification\App\FindUserBadge;

use Alura\Architecture\Gamification\Domain\Badge\BadgeRepository;
use Alura\Architecture\Shared\Domain\Cpf;

class FindUserBadge
{
    private BadgeRepository $repository;

    public function __construct(BadgeRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(FindUserBadgeDto $data): array
    {
        $studentCpf = new Cpf($data->studentCpf);
        return $this->repository->studentBadgesWithCpf($studentCpf);
    }
}
