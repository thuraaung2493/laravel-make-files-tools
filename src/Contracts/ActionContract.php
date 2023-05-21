<?php

declare(strict_types=1);

namespace Thuraaung\MakeFiles\Contracts;

interface ActionContract
{
    public function handle(): mixed;
}
