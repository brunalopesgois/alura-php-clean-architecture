<?php

namespace Tests\Student;

use Alura\Architecture\Domain\Student\Phone;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    public function testPhoneMustBeAbleToBeRepresentedAsString()
    {
        $phone = new Phone('11', '945454545');
        $this->assertSame('(11) 945454545', (string) $phone);
    }

    public function testPhoneWithInvalidDddMustNotBeAbleToExist()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectDeprecationMessage('DDD inválido');
        new Phone('ddd', '945454545');
    }

    public function testPhoneWithInvalidNumberMustNotBeAbleToExist()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectDeprecationMessage('Número de telefone inválido');
        new Phone('11', 'numero');
    }
}
