<?php

declare(strict_types=1);

namespace Thuraaung\MakeFiles\Tests\Console\Commands;

use Illuminate\Support\Facades\File;
use ReflectionClass;
use Thuraaung\MakeFiles\Console\Commands\DataTransferObjectMakeCommand;
use Thuraaung\MakeFiles\Tests\Stubs\UserTestData;

use function Pest\Laravel\artisan;
use function PHPUnit\Framework\assertTrue;

it('can run the command successfully', function (): void {
    artisan(DataTransferObjectMakeCommand::class, ['name' => 'Test'])
        ->assertSuccessful();
});

it('should has right methods', function (): void {
    artisan(DataTransferObjectMakeCommand::class, ['name' => 'Test'])
        ->assertSuccessful();

    $refClass = new ReflectionClass(UserTestData::class);

    expect(
        $refClass->getMethod(
            name: 'of'
        )->hasReturnType()
    )->toBeTrue()->and(
        $refClass->getMethod(
            name: 'toArray'
        )->hasReturnType()
    )->toBeTrue();
});

it('can run the command successfully when --pest option include', function (): void {
    artisan(DataTransferObjectMakeCommand::class, ['name' => 'Tests', '--pest' => true])
        ->assertSuccessful();


    assertTrue(
        File::exists(
            path: app_path("DataObjects/Tests.php")
        )
    );
    assertTrue(
        File::exists(
            path: base_path("tests/Feature/DataObjects/TestsTest.php")
        )
    );
});

it('create the data transfer object when called', function (string $class): void {
    artisan(
        DataTransferObjectMakeCommand::class,
        ['name' => $class]
    )->assertSuccessful();

    assertTrue(
        File::exists(
            path: app_path("DataObjects/{$class}.php")
        )
    );
})->with('classes');
