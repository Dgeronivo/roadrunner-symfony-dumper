<?php

declare(strict_types=1);

namespace RoadrunnerDump\Exception;

class DumpException extends \RuntimeException
{
    /** @var string[] */
    public readonly array $dumps;

    public static function create(string ...$dumps): self
    {
        $exception = new self();
        $exception->dumps = $dumps;

        return $exception;
    }

    public function __toString(): string
    {
        return implode(\PHP_EOL, $this->dumps);
    }
}
