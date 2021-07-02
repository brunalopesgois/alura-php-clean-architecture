<?php

namespace Alura\Architecture\Academic\Infra\Student;

use Alura\Architecture\Academic\Domain\Student\PasswordCypher;

class PasswordCypherPhp implements PasswordCypher
{
    public function cypher(string $password): string
    {
        return password_hash($password, PASSWORD_ARGON2ID);
    }

    public function check(string $textPassword, string $encryptedPassword): bool
    {
        return password_verify($textPassword, $encryptedPassword);
    }
}
