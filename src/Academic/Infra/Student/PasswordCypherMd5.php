<?php

namespace Alura\Architecture\Academic\Infra\Student;

use Alura\Architecture\Academic\Domain\Student\PasswordCypher;

class PasswordCypherMd5 implements PasswordCypher
{
    public function cypher(string $password): string
    {
        return md5($password);
    }

    public function check(string $textPassword, string $encryptedPassword): bool
    {
        return md5($textPassword) === $encryptedPassword;
    }
}
