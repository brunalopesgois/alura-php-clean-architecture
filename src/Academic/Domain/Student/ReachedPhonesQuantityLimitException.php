<?php

namespace Alura\Architecture\Academic\Domain\Student;

use DomainException;

class ReachedPhonesQuantityLimitException extends DomainException
{
    public function __construct()
    {
        parent::__construct('Quantidade de telefones permitidos por aluno é no máximo 2');
    }
}
