<?php

declare(strict_types=1);

namespace dev;

use RoadrunnerDump\Exception\DumpException;
use Symfony\Component\VarDumper\Cloner\VarCloner;
use Symfony\Component\VarDumper\Dumper\HtmlDumper;

function dd(mixed ...$vars)
{
    $dumper = new HtmlDumper();
    $varCloner = new VarCloner();

    $dumps = [];
    foreach ($vars as $var) {
        $dumps[] = $dumper->dump($varCloner->cloneVar($var), true);
    }

    throw DumpException::create(...$dumps);
}
