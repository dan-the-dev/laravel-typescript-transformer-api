<?php
declare(strict_types=1);

namespace Danthedev\LaravelTypescriptTransformerApi\Collectors;

use ReflectionClass;
use Spatie\TypeScriptTransformer\Collectors\DefaultCollector;
use Spatie\TypeScriptTransformer\Structures\TransformedType;
use Spatie\TypeScriptTransformer\TypeReflectors\ClassTypeReflector;

final class DefaultWithInlineNameCollector extends DefaultCollector
{
    public function getTransformedType(ReflectionClass $class): ?TransformedType
    {
        $reflector = ClassTypeReflector::create($class);

        if (! $reflector->isTransformable()) {
            return null;
        }

        $transformedType = $reflector->getType()
            ? $this->resolveAlreadyTransformedType($reflector)
            : $this->resolveTypeViaTransformer($reflector);

        if ($reflector->isInline()) {
            $transformedType->isInline = true;
        }

        return $transformedType;
    }
}
