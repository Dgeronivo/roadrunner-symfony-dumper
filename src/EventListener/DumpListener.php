<?php

declare(strict_types=1);

namespace RoadrunnerDump\EventListener;

use RoadrunnerDump\Exception\DumpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class DumpListener
{
    public function __invoke(ExceptionEvent $event): void
    {
        if ($event->getThrowable() instanceof DumpException) {
            $event->allowCustomResponseCode();
            $event->setResponse(
                new Response($event->getThrowable(), 200),
            );
        }
    }
}
