<?php

declare(strict_types=1);

namespace Thuraaung\MakeFiles\Tests\Console\Commands;

use Illuminate\Support\Facades\File;
use Thuraaung\MakeFiles\Console\Commands\DataTransferObjectMakeCommand;

use function Pest\Laravel\artisan;
use function PHPUnit\Framework\assertTrue;

it('can run the command successfully', function () {
    artisan(DataTransferObjectMakeCommand::class, ['name' => 'Test'])
        ->assertSuccessful();
});

it('can run the command successfully when --pest option include', function () {
    artisan(DataTransferObjectMakeCommand::class, ['name' => 'Tests', '--pest' => true])
        ->assertSuccessful();
});

it('create the data transfer object when called', function (string $class) {
    artisan(
        DataTransferObjectMakeCommand::class,
        ['name' => $class]
    )->assertSuccessful();

    assertTrue(
        File::exists(
            path: app_path("DataObjects/$class.php")
        )
    );
})->with('classes');
