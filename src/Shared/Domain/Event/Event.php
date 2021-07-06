<?php

namespace Alura\Architecture\Shared\Domain\Event;

use DateTimeImmutable;
use JsonSerializable;

interface Event extends JsonSerializable
{
    public function moment(): DateTimeImmutable;
}
