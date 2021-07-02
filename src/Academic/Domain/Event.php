<?php

namespace Alura\Architecture\Academic\Domain;

use DateTimeImmutable;

interface Event
{
    public function moment(): DateTimeImmutable;
}
