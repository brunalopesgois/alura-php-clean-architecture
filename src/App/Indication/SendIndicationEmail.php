<?php

namespace Alura\Architecture\App\Indication;

use Alura\Architecture\Domain\Student\Student;

interface SendIndicationEmail
{
    public function sendTo(Student $indicatedStudent): void;
}
