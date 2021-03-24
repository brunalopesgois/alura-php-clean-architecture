<?php

namespace Alura\Architecture\App\Student;

class EnrollStudentDto
{
    public string $studentCpf;
    public string $studentName;
    public string $studentEmail;

    public function __construct(string $studentCpf, string $studentName, string $studentEmail)
    {
        $this->studentCpf = $studentCpf;
        $this->studentName = $studentName;
        $this->studentEmail = $studentEmail;
    }
}
