<?php

use Alura\Architecture\Domain\Student\Student;
use Alura\Architecture\Infra\Student\StudentMemoryRepository;
use Alura\Architecture\Infra\Student\StudentPdoRepository;

require 'vendor/autoload.php';

$cpf = $argv[1];
$name = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$number = $argv[5];

$student = Student::withCpfNameAndEmail($cpf, $name, $email)->addPhoneNumber($ddd, $number);
$repository = new StudentMemoryRepository();
$con = 'sqlite:host=localhost;dbname=banco';
//$repository = new StudentPdoRepository(PDO, $con);
$repository->add($student);

print_r($repository->findAll());
