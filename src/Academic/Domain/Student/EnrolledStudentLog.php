<?php

namespace Alura\Architecture\Academic\Domain\Student;

use Alura\Architecture\Academic\Domain\Student\EnrolledStudentEvent;
use Alura\Architecture\Shared\Domain\Event\Event;
use Alura\Architecture\Shared\Domain\Event\EventListener;

class EnrolledStudentLog extends EventListener
{
    /**
     * @param EnrolledStudentEvent $enrolledStudent
     */
    public function reactTo(Event $enrolledStudent): void
    {
        fprintf(
            STDERR,
            'Aluno com CPF %s foi matriculado na data %s',
            (string) $enrolledStudent->studentCpf(),
            (string) $enrolledStudent->moment()->format('d/m/Y')
        );
    }

    public function knowHowHandle(Event $event): bool
    {
        return $event instanceof EnrolledStudentEvent;
    }
}
