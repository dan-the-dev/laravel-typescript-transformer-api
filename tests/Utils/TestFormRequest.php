<?php
declare(strict_types=1);

namespace Tests\Utils;

use Illuminate\Foundation\Http\FormRequest;

final class TestFormRequest extends FormRequest
{
    public readonly string $stringName;
    public readonly int $intName;
    public readonly float $floatName;
}
