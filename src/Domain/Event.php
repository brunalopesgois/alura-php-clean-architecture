<?php

namespace Alura\Architecture\Domain;

use DateTimeImmutable;

interface Event
{
    public function moment(): DateTimeImmutable;
}
