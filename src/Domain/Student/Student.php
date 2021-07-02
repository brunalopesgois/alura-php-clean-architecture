<?php

namespace Alura\Architecture\Domain\Student;

use Alura\Architecture\Domain\Cpf;
use Alura\Architecture\Domain\Email;

class Student
{
    private Cpf $cpf;
    private string $name;
    private Email $email;
    private array $phones;
    private string $password;

    public static function withCpfNameAndEmail(string $cpf, string $name, string $email): self
    {
        return new Student(new Cpf($cpf), $name, new Email($email));
    }

    public function __construct(Cpf $cpf, string $name, Email $email)
    {
        $this->cpf = $cpf;
        $this->name = $name;
        $this->email = $email;
        $this->phones = [];
    }

    public function addPhoneNumber(string $ddd, string $number): self
    {
        if (count($this->phones) == 2) {
            throw new ReachedPhonesQuantityLimitException();
        }
        
        $this->phones[] = new Phone($ddd, $number);
        return $this;
    }

    public function cpf(): Cpf
    {
        return $this->cpf;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    /** @return Phone[] */
    public function phones(): array
    {
        return $this->phones;
    }
}
