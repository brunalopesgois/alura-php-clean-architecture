<?php

namespace Alura\Architecture\Domain\Student;

class Student
{
    private Cpf $cpf;
    private string $name;
    private Email $email;
    private array $phones;

    public static function withCpfNameAndEmail(string $cpf, string $name, string $email): self
    {
        return new Student(new Cpf($cpf), $name, new Email($email));
    }

    public function addPhoneNumber(string $ddd, string $number): self
    {
        $this->phones[] = new Phone($ddd, $number);
        return $this;
    }
}
