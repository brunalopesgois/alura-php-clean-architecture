<?php

use Alura\Architecture\Academic\App\Student\EnrollStudent\EnrollStudent;
use Alura\Architecture\Academic\App\Student\EnrollStudent\EnrollStudentDto;
use Alura\Architecture\Academic\Domain\EventPublisher;
use Alura\Architecture\Academic\Domain\Student\Student;
use Alura\Architecture\Academic\Domain\Student\EnrolledStudentLog;
use Alura\Architecture\Academic\Infra\Student\StudentMemoryRepository;
use Alura\Architecture\Academic\Infra\Student\StudentPdoRepository;

require 'vendor/autoload.php';

$cpf = $argv[1];
$name = $argv[2];
$email = $argv[3];
// $ddd = $argv[4];
// $number = $argv[5];

// $student = Student::withCpfNameAndEmail($cpf, $name, $email)->addPhoneNumber($ddd, $number);
// $repository = new StudentMemoryRepository();
// $con = 'sqlite:host=localhost;dbname=banco';
//$repository = new StudentPdoRepository(PDO, $con);
// $repository->add($student);

// print_r($repository->findAll());

$publisher = new EventPublisher();
$publisher->addListener(new EnrolledStudentLog());
$useCase = new EnrollStudent(new StudentMemoryRepository(), $publisher);

$useCase->execute(new EnrollStudentDto($cpf, $name, $email));
