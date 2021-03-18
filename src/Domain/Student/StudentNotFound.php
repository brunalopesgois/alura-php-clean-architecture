<?php

namespace Alura\Architecture\Domain\Student;

use Alura\Architecture\Domain\Cpf;
use DomainException;

class StudentNotFound extends DomainException
{
    public function __construct(Cpf $cpf)
    {
        parent::__construct("Aluno com CPF $cpf não encontrado");
    }
}
