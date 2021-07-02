<?php

namespace Alura\Architecture\Academic\Domain\Student;

use Alura\Architecture\Academic\Domain\Cpf;
use Alura\Architecture\Academic\Domain\Event;
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
