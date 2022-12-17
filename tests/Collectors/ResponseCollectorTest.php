<?php
declare(strict_types=1);

namespace Tests\Collectors;

use Danthedev\LaravelTypescriptTransformerApi\Collectors\ResponseCollector;
use Danthedev\LaravelTypescriptTransformerApi\Transformers\ResponseTransformer;
use Illuminate\Http\Response;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Spatie\TypeScriptTransformer\TypeScriptTransformerConfig;

final class ResponseCollectorTest extends TestCase
{
    public function testItReturnTransformedTypeForResponse(): void
    {
        $config = TypeScriptTransformerConfig::create()
            ->transformers([
                ResponseTransformer::class
            ]);
        $collector = new ResponseCollector($config);
        $reflectionClass = new ReflectionClass(new TestResponse());
        $actual = $collector->getTransformedType($reflectionClass);
        $this->assertEquals(<<<STRING
type TestResponse = {
stringName: string;
intName: number;
floatName: number;
};
STRING
            , $actual->toString());
    }
}

class TestResponse extends Response
{
    public readonly string $stringName;
    public readonly int $intName;
    public readonly float $floatName;
}
