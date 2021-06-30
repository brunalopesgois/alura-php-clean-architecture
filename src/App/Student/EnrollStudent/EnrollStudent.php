<?php

namespace Alura\Architecture\App\Student\EnrollStudent;

use Alura\Architecture\Domain\Student\Student;
use Alura\Architecture\Domain\Student\StudentRepository;

class EnrollStudent
{
    private StudentRepository $repository;

    public function __construct(StudentRepository $repository)
    {
        $this->repository = $repository;
    }
    
    public function execute(EnrollStudentDto $data): void
    {
        $student = Student::withCpfNameAndEmail($data->studentCpf, $data->studentName, $data->studentEmail);
        $this->repository->add($student);
    }
}
