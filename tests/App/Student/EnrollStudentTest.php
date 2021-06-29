<?php

namespace Tests\App\Student;

use Alura\Architecture\App\Student\EnrollStudent;
use Alura\Architecture\App\Student\EnrollStudentDto;
use Alura\Architecture\Domain\Cpf;
use Alura\Architecture\Infra\Student\StudentMemoryRepository;
use PHPUnit\Framework\TestCase;

class EnrollStudentTest extends TestCase
{
    public function testStudentItMustBeAddedToRepository()
    {
        $studentData = new EnrollStudentDto(
            '123.456.789-10',
            'Teste',
            'email@example.com'
        );
        $studentRepository = new StudentMemoryRepository();
        $useCase = new EnrollStudent($studentRepository);

        $useCase->execute($studentData);

        $student  = $studentRepository->findByCpf(new Cpf('123.456.789-10'));
        $this->assertSame('Teste', (string) $student->name());
        $this->assertSame('email@example.com', (string) $student->email());
        $this->assertEmpty($student->phones());
    }
}
