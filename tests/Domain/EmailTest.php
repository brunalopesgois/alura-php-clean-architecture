<?php

namespace Tests\Domain;

use Alura\Architecture\Domain\Email;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    public function testEmailWithInvalidFormatMustNotBeAbleToExist()
    {
        $this->expectException(InvalidArgumentException::class);
        new Email('email inválido');
    }

    public function testEmailMustBeAbleToBeRepresentedAsString()
    {
        $email = new Email('address@example.com');
        $this->assertSame('address@example.com', (string) $email);
    }
}
