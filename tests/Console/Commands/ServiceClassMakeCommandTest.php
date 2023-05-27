<?php

declare(strict_types=1);

namespace Thuraaung\MakeFiles\Tests\Console\Commands;

use Illuminate\Support\Facades\File;
use Thuraaung\MakeFiles\Console\Commands\ServiceClassMakeCommand;

use function Pest\Laravel\artisan;
use function PHPUnit\Framework\assertTrue;

it('can run the command successfully', function (): void {
    artisan(ServiceClassMakeCommand::class, ['name' => 'Test'])
        ->assertSuccessful();
});

it('can run the command successfully when --pest option include', function (): void {
    artisan(ServiceClassMakeCommand::class, ['name' => 'Tests', '--pest' => true])
        ->assertSuccessful();
});

it('create the service class when called', function (string $class): void {
    artisan(
        ServiceClassMakeCommand::class,
        ['name' => $class]
    )->assertSuccessful();

    assertTrue(
        File::exists(
            path: app_path("Services/{$class}.php")
        )
    );
})->with('services');
