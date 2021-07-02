<?php

namespace Alura\Architecture\Academic\Infra\Student;

use Alura\Architecture\Academic\Domain\Cpf;
use Alura\Architecture\Academic\Domain\Student\Student;
use Alura\Architecture\Academic\Domain\Student\StudentNotFound;
use Alura\Architecture\Academic\Domain\Student\StudentRepository;
use Exception;

class StudentMemoryRepository implements StudentRepository
{
    private array $students;
    
    public function add(Student $student): void
    {
        $this->students[] = $student;
    }

    public function findByCpf(Cpf $cpf): Student
    {
        $filteredStudents = array_filter(
            $this->students,
            fn (Student $student) => $student->cpf() == $cpf
        );

        if (count($filteredStudents) === 0) {
            throw new StudentNotFound($cpf);
        }

        if (count($filteredStudents) > 1) {
            throw new Exception();
        }

        return $filteredStudents[0];
    }

    public function findAll(): array
    {
        return $this->students;
    }
}
