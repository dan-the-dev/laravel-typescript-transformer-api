<?php
declare(strict_types=1);

namespace Tests\Utils;

use Illuminate\Http\Request;

final class TestRequest extends Request
{
    public readonly string $stringName;
    public readonly int $intName;
    public readonly float $floatName;
}
