<?php

namespace Alura\Arquitetura;

class StudentFactory
{
    private Student $student;
    
    public function withCpfEmailAndName(string $cpfNumber, string $email, string $name): self
    {
        $this->student = new Student(new Cpf($cpfNumber), $name, new Email($email));
        return $this;
    }

    public function addPhone(string $ddd, string $number): self
    {
        $this->student->addPhoneNumber($ddd, $number);
        return $this;
    }

    public function student(): Student
    {
        return $this->student;
    }
}
