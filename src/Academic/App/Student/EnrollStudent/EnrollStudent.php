<?php

namespace Alura\Architecture\Academic\App\Student\EnrollStudent;

use Alura\Architecture\Academic\Domain\EventPublisher;
use Alura\Architecture\Academic\Domain\Student\EnrolledStudentEvent;
use Alura\Architecture\Academic\Domain\Student\Student;
use Alura\Architecture\Academic\Domain\Student\StudentRepository;
use Alura\Architecture\Academic\Infra\Student\EnrolledStudentLog;

class EnrollStudent
{
    private StudentRepository $repository;
    private EventPublisher $publisher;

    public function __construct(StudentRepository $repository, EventPublisher $publisher)
    {
        $this->repository = $repository;
        $this->publisher = $publisher;
    }
    
    public function execute(EnrollStudentDto $data): void
    {
        $student = Student::withCpfNameAndEmail($data->studentCpf, $data->studentName, $data->studentEmail);
        $this->repository->add($student);

        $event = new EnrolledStudentEvent($student->cpf());
        $this->publisher->publish($event);
    }
}
