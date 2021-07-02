<?php

namespace Tests\Academic\App\Student;

use Alura\Architecture\Academic\App\Student\EnrollStudent\EnrollStudent;
use Alura\Architecture\Academic\App\Student\EnrollStudent\EnrollStudentDto;
use Alura\Architecture\Academic\Domain\Cpf;
use Alura\Architecture\Academic\Domain\EventPublisher;
use Alura\Architecture\Academic\Infra\Student\StudentMemoryRepository;
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
        $useCase = new EnrollStudent($studentRepository, $this->createStub(EventPublisher::class));
        
        $useCase->execute($studentData);

        $student  = $studentRepository->findByCpf(new Cpf('123.456.789-10'));
        $this->assertSame('Teste', (string) $student->name());
        $this->assertSame('email@example.com', (string) $student->email());
        $this->assertEmpty($student->phones());
    }
}
