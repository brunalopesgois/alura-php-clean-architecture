<?php

namespace Alura\Architecture\Academic\App\Indication;

use Alura\Architecture\Academic\Domain\Student\Student;

interface SendIndicationEmail
{
    public function sendTo(Student $indicatedStudent): void;
}
