<?php
declare(strict_types=1);

namespace Danthedev\LaravelTypescriptTransformerApi\Transformers;


use ReflectionClass;
use ReflectionProperty;
use Spatie\TypeScriptTransformer\Transformers\DtoTransformer;
use Symfony\Component\HttpFoundation\Request;

final class RequestTransformer extends DtoTransformer
{
    protected function resolveProperties(ReflectionClass $class): array
    {
        $properties = array_filter(
            $class->getProperties(ReflectionProperty::IS_PUBLIC),
            function (ReflectionProperty $property) {
                return  ! $property->isStatic() && $property->class !== Request::class;
            }
        );

        return array_values($properties);
    }
}
