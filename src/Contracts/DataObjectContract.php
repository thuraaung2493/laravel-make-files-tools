<?php

declare(strict_types=1);

namespace Thuraaung\MakeFiles\Contracts;

interface DataObjectContract
{
    public function of(array $attributes): DataObjectContract;

    public function toArray(): array;
}
