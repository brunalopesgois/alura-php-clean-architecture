<?php

namespace Tests\Academic\Domain\Student;

use Alura\Architecture\Academic\Domain\Student\ReachedPhonesQuantityLimitException;
use Alura\Architecture\Academic\Domain\Student\Student;
use PHPUnit\Framework\TestCase;

class StudentTest extends TestCase
{
    public function testStudentMustNotBeAbleToAddMoreThan2Phones(): void
    {
        $student = Student::withCpfNameAndEmail(
            '123.456.789-10',
            'John Doe',
            'example@email.com'
        )
            ->addPhoneNumber('11', '45454545')
            ->addPhoneNumber('11', '54545454');
        
        $this->expectException(ReachedPhonesQuantityLimitException::class);
        $student->addPhoneNumber('11', '32323232');
    }
}
