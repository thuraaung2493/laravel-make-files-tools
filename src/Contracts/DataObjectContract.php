<?php

declare(strict_types=1);

namespace Thuraaung\MakeFiles\Contracts;

interface DataObjectContract
{
    /**
     * @return array<string,mixed>
     */
    public function toArray(): array;
}
