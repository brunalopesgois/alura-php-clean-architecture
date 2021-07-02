<?php

namespace Alura\Architecture\Academic\Domain\Student;

interface PasswordCypher
{
    public function cypher(string $password): string;
    public function check(string $textPassword, string $encryptedPassword): bool;
}
