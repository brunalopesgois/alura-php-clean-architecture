<?php

namespace Alura\Architecture\Academic\Domain\Student;

use Alura\Architecture\Shared\Domain\Cpf;
use Alura\Architecture\Shared\Domain\Event\Event;
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

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }

    public function studentCpf(): Cpf
    {
        return $this->studentCpf;
    }
}
