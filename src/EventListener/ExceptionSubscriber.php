<?php

declare(strict_types=1);

namespace RoadrunnerDump\EventListener;

use RoadrunnerDump\Exception\DumpException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ExceptionSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
            ExceptionEvent::class => 'checkDump',
        ];
    }

    public function checkDump(ExceptionEvent $event): void
    {
        if ($event->getThrowable() instanceof DumpException) {
            $event->allowCustomResponseCode();
            $event->setResponse(
                new Response($e, 200),
            );
        }
    }
}
