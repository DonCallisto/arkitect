<?php
declare(strict_types=1);

namespace Arkitect\Expression;

use Arkitect\Analyzer\ClassDescription;

class HaveNameMatching implements Expression
{
    public function __construct(string $pattern)
    {
    }

    public function __invoke(ClassDescription $class): bool
    {
        return true; // TODO
    }
}
