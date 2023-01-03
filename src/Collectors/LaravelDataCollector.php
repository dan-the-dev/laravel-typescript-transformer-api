<?php
declare(strict_types=1);

namespace Danthedev\LaravelTypescriptTransformerApi\Collectors;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use ReflectionClass;
use Spatie\LaravelData\Data;
use Spatie\TypeScriptTransformer\Collectors\DefaultCollector;
use Spatie\TypeScriptTransformer\Structures\TransformedType;
use Spatie\TypeScriptTransformer\TypeReflectors\ClassTypeReflector;

final class LaravelDataCollector extends DefaultCollector
{
    public function getTransformedType(ReflectionClass $class): ?TransformedType
    {
        $reflector = ClassTypeReflector::create($class);

        if (! $class->isSubclassOf(Data::class)) {
            return null;
        }

        $transformedType = $reflector->getType()
            ? $this->resolveAlreadyTransformedType($reflector)
            : $this->resolveTypeViaTransformer($reflector);

        if ($reflector->isInline()) {
            $transformedType->name = null;
            $transformedType->isInline = true;
        }

        return $transformedType;
    }
}
