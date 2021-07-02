<?php

namespace Alura\Architecture\Domain\Student;

use Alura\Architecture\Domain\Cpf;
use Alura\Architecture\Domain\Event;
use DateTimeImmutable;

class EnrolledStudentEvent implements Event
{
    private DateTimeImmutable $moment;
    private Cpf $studentCpf;
    
    public function __construct(Cpf $studentCpf)
    {
        $this->moment = new DateTimeImmutable();
        $this->studentCpf = $studentCpf;
    }
    
    public function moment(): DateTimeImmutable
    {
        return $this->moment;
    }

    public function studentCpf(): Cpf
    {
        return $this->studentCpf;
    }
}
