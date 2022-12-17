<?php
declare(strict_types=1);

namespace Danthedev\LaravelTypescriptTransformerApi\Transformers;


use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use ReflectionClass;
use ReflectionProperty;
use Spatie\TypeScriptTransformer\Transformers\DtoTransformer;

final class ResponseTransformer extends DtoTransformer
{
    protected function canTransform(ReflectionClass $class): bool
    {
        return $class->isSubclassOf(Response::class) || $class->isSubclassOf(SymfonyResponse::class);
    }

    protected function resolveProperties(ReflectionClass $class): array
    {
        $properties = array_filter(
            $class->getProperties(ReflectionProperty::IS_PUBLIC),
            function (ReflectionProperty $property) {
                return  ! $property->isStatic() &&
                    $property->class !== Response::class &&
                    $property->class !== SymfonyResponse::class;
            }
        );

        return array_values($properties);
    }
}
