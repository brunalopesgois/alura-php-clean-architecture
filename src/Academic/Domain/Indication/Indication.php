<?php

namespace Alura\Architecture\Academic\Domain\Indication;

use DateTimeImmutable;

class Indication
{
    private Student $indicative;
    private Student $indicated;
    private DateTimeImmutable $date;

    public function __construct($indicative, $indicated)
    {
        $this->indicative = $indicative;
        $this->indicated = $indicated;

        $this->date = new DateTimeImmutable();
    }
}
