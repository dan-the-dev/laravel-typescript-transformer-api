<?php
declare(strict_types=1);

namespace Collectors;

use Danthedev\LaravelTypescriptTransformerApi\Collectors\LaravelDataCollector;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Spatie\TypeScriptTransformer\Transformers\DtoTransformer;
use Spatie\TypeScriptTransformer\TypeScriptTransformerConfig;
use Tests\Utils\TestData;

final class LaravelDataCollectorTest extends TestCase
{
    public function testItReturnTransformedTypeForLaravelData(): void
    {
        $config = TypeScriptTransformerConfig::create()
            ->transformers([
                DtoTransformer::class
            ]);
        $collector = new LaravelDataCollector($config);
        $reflectionClass = new ReflectionClass(new TestData());
        $actual = $collector->getTransformedType($reflectionClass);
        $this->assertEquals(<<<STRING
type TestData = {
title: string;
content: string;
quantity: number;
};
STRING
            , $actual->toString());
    }
}
