<?php

declare(strict_types=1);

namespace Thuraaung\MakeFiles\Tests;

use Orchestra\Testbench\TestCase;
use Thuraaung\MakeFiles\Providers\PackageServiceProvider;

final class PackageTestCase extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            PackageServiceProvider::class,
        ];
    }
}
