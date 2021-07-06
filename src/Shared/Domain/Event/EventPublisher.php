<?php

namespace Alura\Architecture\Shared\Domain\Event;

class EventPublisher
{
    private array $listeners = [];
    
    public function addListener($listener): void
    {
        $this->listeners[] = $listener;
    }

    public function publish(Event $event)
    {
        foreach ($this->listeners as $listener) {
            $listener->handle($event);
        }
    }
}
