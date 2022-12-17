<?php
declare(strict_types=1);

namespace Tests\UseCases;

use Danthedev\LaravelTypescriptTransformerApi\Collectors\RequestCollector;
use Danthedev\LaravelTypescriptTransformerApi\Collectors\ResponseCollector;
use Danthedev\LaravelTypescriptTransformerApi\Transformers\RequestTransformer;
use Danthedev\LaravelTypescriptTransformerApi\Transformers\ResponseTransformer;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Spatie\TypeScriptTransformer\TypeScriptTransformerConfig;
use Tests\Utils\TestFormRequest;
use Tests\Utils\TestRequest;
use Tests\Utils\TestResponse;

final class RequestAndResponseCollectorsTest extends TestCase
{
    public function testItReturnTransformedTypeWithRequestTransformerBeforeResponse(): void
    {
        $config = TypeScriptTransformerConfig::create()
            ->transformers([
                RequestTransformer::class,
                ResponseTransformer::class,
            ]);
        $responseCollector = new ResponseCollector($config);

        $actual = $responseCollector->getTransformedType(new ReflectionClass(new TestResponse()));
        $this->assertEquals(<<<STRING
type TestResponse = {
stringName: string;
intName: number;
floatName: number;
};
STRING
            , $actual->toString());

        $requestCollector = new RequestCollector($config);
        $actual = $requestCollector->getTransformedType(new ReflectionClass(new TestRequest()));
        $this->assertEquals(<<<STRING
type TestRequest = {
stringName: string;
intName: number;
floatName: number;
};
STRING
            , $actual->toString());

        $actual = $requestCollector->getTransformedType(new ReflectionClass(new TestFormRequest()));
        $this->assertEquals(<<<STRING
type TestFormRequest = {
stringName: string;
intName: number;
floatName: number;
};
STRING
            , $actual->toString());

    }

    public function testItReturnTransformedTypeWithResponseTransformerBeforeRequest(): void
    {
        $config = TypeScriptTransformerConfig::create()
            ->transformers([
                ResponseTransformer::class,
                RequestTransformer::class,
            ]);
        $responseCollector = new ResponseCollector($config);

        $actual = $responseCollector->getTransformedType(new ReflectionClass(new TestResponse()));
        $this->assertEquals(<<<STRING
type TestResponse = {
stringName: string;
intName: number;
floatName: number;
};
STRING
            , $actual->toString());

        $requestCollector = new RequestCollector($config);
        $actual = $requestCollector->getTransformedType(new ReflectionClass(new TestRequest()));
        $this->assertEquals(<<<STRING
type TestRequest = {
stringName: string;
intName: number;
floatName: number;
};
STRING
            , $actual->toString());

        $actual = $requestCollector->getTransformedType(new ReflectionClass(new TestFormRequest()));
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
