<?php

namespace Alura\Architecture\Domain\Student;

interface PasswordCypher
{
    public function cypher(string $password): string;
    public function check(string $textPassword, string $encryptedPassword): bool;
}
