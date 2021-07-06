<?php

namespace Alura\Architecture\Gamification\App;

use Alura\Architecture\Gamification\Domain\Badge\Badge;
use Alura\Architecture\Gamification\Domain\Badge\BadgeRepository;
use Alura\Architecture\Shared\Domain\Event\Event;
use Alura\Architecture\Shared\Domain\Event\EventListener;

class GeneratesNewbieBadge extends EventListener
{
    private BadgeRepository $badgeRepository;
    
    public function __construct(BadgeRepository $badgeRepository)
    {
        $this->badgeRepository = $badgeRepository;
    }
    
    public function knowHowHandle(Event $event): bool
    {
        return get_class($event) === 'Alura\Architecture\Academic\Domain\Student\EnrolledStudentEvent';
    }

    public function reactTo(Event $event): void
    {
        $array = $event->jsonSerialize();
        $cpf = $array['studentCpf'];

        $badge = new Badge($cpf, 'Novato');
        $this->badgeRepository->add($badge);
    }
}
