<?php

namespace Alura\Architecture\Domain\Student;

use Alura\Architecture\Domain\Event;
use Alura\Architecture\Domain\EventListener;
use Alura\Architecture\Domain\Student\EnrolledStudentEvent;

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
