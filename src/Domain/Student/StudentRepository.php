<?php

namespace Alura\Architecture\Domain\Student;

use Alura\Architecture\Domain\Cpf;

interface StudentRepository
{
    public function add(Student $student): void;
    public function findByCpf(Cpf $cpf): Student;
    /** @return Student[] */
    public function findAll(): array;
}
