<?php

declare(strict_types=1);

namespace Thuraaung\MakeFiles\Tests\Console\Commands;

use Illuminate\Support\Facades\File;
use Thuraaung\MakeFiles\Console\Commands\ActionClassMakeCommand;

use function Pest\Laravel\artisan;
use function PHPUnit\Framework\assertTrue;

it('can run the command successfully', function (): void {
    artisan(ActionClassMakeCommand::class, ['name' => 'Test'])
        ->assertSuccessful();
});

it('can run the command successfully when --pest option include', function (): void {
    artisan(ActionClassMakeCommand::class, ['name' => 'Tests', '--pest' => true])
        ->assertSuccessful();
});

it('create the action class when called', function (string $class): void {
    artisan(
        ActionClassMakeCommand::class,
        ['name' => $class]
    )->assertSuccessful();

    assertTrue(
        File::exists(
            path: app_path("Actions/{$class}.php")
        )
    );
})->with('actions');
