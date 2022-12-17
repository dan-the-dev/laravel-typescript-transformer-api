<?php
declare(strict_types=1);

namespace Tests\Utils;

use Illuminate\Http\Response;

final class TestResponse extends Response
{
    public readonly string $stringName;
    public readonly int $intName;
    public readonly float $floatName;
}
