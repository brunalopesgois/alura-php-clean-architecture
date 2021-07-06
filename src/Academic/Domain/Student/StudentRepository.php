<?php

namespace Alura\Architecture\Academic\Domain\Student;

use Alura\Architecture\Shared\Domain\Cpf;

interface StudentRepository
{
    public function add(Student $student): void;
    public function findByCpf(Cpf $cpf): Student;
    /** @return Student[] */
    public function findAll(): array;
}
