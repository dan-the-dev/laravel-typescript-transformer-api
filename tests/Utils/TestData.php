<?php
declare(strict_types=1);

namespace Tests\Utils;

use Spatie\LaravelData\Data;

final class TestData extends Data
{
    public readonly string $title;
    public readonly string $content;
    public readonly int $quantity;
}
