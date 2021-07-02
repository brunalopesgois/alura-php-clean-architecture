<?php

namespace Alura\Architecture\Academic\Domain;

abstract class EventListener
{
    public function handle(Event $event): void
    {
        if ($this->knowHowHandle($event)) {
            $this->reactTo($event);
        }
    }

    abstract public function knowHowHandle(Event $event): bool;

    abstract public function reactTo(Event $event): void;
}
