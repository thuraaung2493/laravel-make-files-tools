<?php

declare(strict_types=1);

namespace Thuraaung\MakeFiles\Contracts;

interface DataObjectContract
{
    /**
     * @param array $attributes
     *
     * @return self
     */
    public static function of(array $attributes): self;

    /**
     * @return array<string,mixed>
     */
    public function toArray(): array;
}
