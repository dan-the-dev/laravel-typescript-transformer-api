<?php
declare(strict_types=1);

namespace Tests\Collectors;

use Danthedev\LaravelTypescriptTransformerApi\Collectors\RequestCollector;
use Danthedev\LaravelTypescriptTransformerApi\Transformers\RequestTransformer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Spatie\TypeScriptTransformer\TypeScriptTransformerConfig;
use Tests\Utils\TestFormRequest;
use Tests\Utils\TestRequest;

final class RequestCollectorTest extends TestCase
{
    public function testItReturnTransformedTypeForRequest(): void
    {
        $config = TypeScriptTransformerConfig::create()
            ->transformers([
                RequestTransformer::class
            ]);
        $collector = new RequestCollector($config);
        $reflectionClass = new ReflectionClass(new TestRequest());
        $actual = $collector->getTransformedType($reflectionClass);
        $this->assertEquals(<<<STRING
type TestRequest = {
stringName: string;
intName: number;
floatName: number;
};
STRING
            , $actual->toString());
    }

    public function testItReturnTransformedTypeForFormRequest(): void
    {
        $config = TypeScriptTransformerConfig::create()
            ->transformers([
                RequestTransformer::class
            ]);
        $collector = new RequestCollector($config);
        $reflectionClass = new ReflectionClass(new TestFormRequest());
        $actual = $collector->getTransformedType($reflectionClass);
        $this->assertEquals(<<<STRING
type TestFormRequest = {
stringName: string;
intName: number;
floatName: number;
};
STRING
            , $actual->toString());
    }
}
