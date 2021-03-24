<?php

use Alura\Architecture\Domain\Student\Student;
use Alura\Architecture\Infra\Student\StudentMemoryRepository;

require 'vendor/autoload.php';

$cpf = $argv[1];
$name = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$number = $argv[5];

$student = Student::withCpfNameAndEmail($cpf, $name, $email)->addPhoneNumber($ddd, $number);
$repository = new StudentMemoryRepository();
$repository->add($student);
