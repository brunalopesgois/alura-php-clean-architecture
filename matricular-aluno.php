<?php

use Alura\Architecture\Academic\App\Student\EnrollStudent\EnrollStudent;
use Alura\Architecture\Academic\App\Student\EnrollStudent\EnrollStudentDto;
use Alura\Architecture\Academic\Domain\Student\Student;
use Alura\Architecture\Academic\Domain\Student\EnrolledStudentLog;
use Alura\Architecture\Academic\Infra\Student\StudentMemoryRepository;
use Alura\Architecture\Academic\Infra\Student\StudentPdoRepository;
use Alura\Architecture\Gamification\App\GeneratesNewbieBadge;
use Alura\Architecture\Gamification\Infra\Badge\BadgeMemoryRepository;
use Alura\Architecture\Shared\Domain\Cpf;
use Alura\Architecture\Shared\Domain\Event\EventPublisher;

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
$badgeRepository = new BadgeMemoryRepository();
$publisher->addListener(new GeneratesNewbieBadge($badgeRepository));
$useCase = new EnrollStudent(new StudentMemoryRepository(), $publisher);

$useCase->execute(new EnrollStudentDto($cpf, $name, $email));

$badge = $badgeRepository->studentBadgesWithCpf(new Cpf('123.456.789-10'));

print_r($badge);
