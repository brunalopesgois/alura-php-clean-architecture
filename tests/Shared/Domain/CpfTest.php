<?php

namespace Tests\Shared\Domain;

use Alura\Architecture\Shared\Domain\Cpf;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testCpfWithNumberInInvalidFormatMustNotBeAbleToExist()
    {
        $this->expectException(InvalidArgumentException::class);
        new Cpf('12345678910');
    }

    public function testCpfMustBeAbleToBeRepresentedAsString()
    {
        $cpf = new Cpf('123.456.789-10');
        $this->assertSame('123.456.789-10', (string) $cpf);
    }
}
