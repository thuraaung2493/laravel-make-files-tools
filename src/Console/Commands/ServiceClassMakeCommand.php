<?php

declare(strict_types=1);

namespace Thuraaung\MakeFiles\Console\Commands;

use Illuminate\Console\Concerns\CreatesMatchingTest;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'make:service')]
final class ServiceClassMakeCommand extends GeneratorCommand
{
    use CreatesMatchingTest;

    protected $signature = "make:service {name : The Service Name}";

    protected $description = "Create a new Service Class";

    protected $type = 'Service Class';

    protected function getStub(): string
    {
        $readonly = Str::contains(
            haystack: PHP_VERSION,
            needles: '8.2',
        );

        $file = $readonly ? 'service-82.stub' : 'service.stub';

        return __DIR__ . "/../../../stubs/{$file}";
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return "{$rootNamespace}\\Services";
    }
}
