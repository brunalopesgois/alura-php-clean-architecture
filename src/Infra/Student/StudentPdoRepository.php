<?php

namespace Alura\Architecture\Infra\Student;

use Alura\Architecture\Domain\Cpf;
use Alura\Architecture\Domain\Student\Student;
use Alura\Architecture\Domain\Student\StudentNotFound;
use Alura\Architecture\Domain\Student\StudentRepository;
use PDO;

class StudentPdoRepository implements StudentRepository
{
    private PDO $connection;
    
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }
    
    public function add(Student $student): void
    {
        $sql = 'INSERT INTO students VALUES (:cpf, :name, :email);';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('cpf', $student->cpf());
        $stmt->bindValue('name', $student->name());
        $stmt->bindValue('email', $student->email());
        $stmt->execute();

        $sql = 'INSERT INTO phones VALUES (:ddd, :number, :student_cpf);';
        $stmt->prepare($sql);
        $stmt->bindValue('student_cpf', $student->cpf());

        /** @var Phone $phone */
        foreach ($student->phones() as $phone) {
            $stmt->bindValue('ddd', $phone->ddd());
            $stmt->bindValue('number', $phone->number());
            $stmt->execute();
        }
    }

    public function findByCpf(Cpf $cpf): Student
    {
        $sql = '
            SELECT cpf, name, email, ddd, number as phone_number 
            FROM students
            LEFT JOIN phones on phones.student_cpf = students.cpf
            WHERE students.cpf = ?;
        ';
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue(1, (string) $cpf);
        $stmt->execute();

        $studentData = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($studentData) === 0) {
            throw new StudentNotFound($cpf);
        }

        return $this->studentMap($studentData);
    }

    public function findAll(): array
    {
        $sql = '
            SELECT cpf, name, email, ddd, number as phone_number
            FROM students
            LEFT JOIN phones on phones.student_cpf = students.cpf
        ';
        $stmt = $this->connection->query($sql);
        $studentDataList = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $students = [];

        foreach ($studentDataList as $studentData) {
            if (!array_key_exists($studentData['cpf'], $students)) {
                $students[$studentData['cpf']] = Student::withCpfNameAndEmail(
                    $studentData['cpf'],
                    $studentData['name'],
                    $studentData['email']
                );
            }

            $students[$studentData['cpf']]->addPhoneNumber($studentData['ddd'], $studentData['phone_number']);
        }

        return array_values($students);
    }

    private function studentMap($studentData): Student
    {
        $firstLine = $studentData[0];
        $student = Student::withCpfNameAndEmail($firstLine['cpf'], $firstLine['name'], $firstLine['email']);
        $phones = array_filter($studentData, fn ($line) => $line['ddd'] !== null && $line['number'] !== null);
        foreach ($phones as $line) {
            $student->addPhoneNumber($line['ddd'], $line['phone_number']);
        }

        return $student;
    }
}
