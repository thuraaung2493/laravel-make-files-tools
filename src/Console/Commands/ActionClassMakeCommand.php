<?php

declare(strict_types=1);

namespace Thuraaung\MakeFiles\Console\Commands;

use Illuminate\Console\Concerns\CreatesMatchingTest;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use Symfony\Component\Console\Attribute\AsCommand;

#[AsCommand(name: 'make:action')]
final class ActionClassMakeCommand extends GeneratorCommand
{
    use CreatesMatchingTest;

    protected $signature = "make:action {name : The Action Name}";

    protected $description = "Create a new Action Class";

    protected $type = 'Action Class';

    protected function getStub(): string
    {
        $readonly = Str::contains(
            haystack: PHP_VERSION,
            needles: '8.2',
        );

        $file = $readonly ? 'action-82.stub' : 'action.stub';

        return __DIR__ . "/../../../stubs/{$file}";
    }

    protected function getDefaultNamespace($rootNamespace): string
    {
        return "{$rootNamespace}\\Actions";
    }
}
