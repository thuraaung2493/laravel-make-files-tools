<?php

declare(strict_types=1);

namespace Thuraaung\MakeFiles\Providers;

use Illuminate\Support\ServiceProvider;
use Thuraaung\MakeFiles\Console\Commands\ActionClassMakeCommand;
use Thuraaung\MakeFiles\Console\Commands\DataTransferObjectMakeCommand;
use Thuraaung\MakeFiles\Console\Commands\ServiceClassMakeCommand;

final class PackageServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands(
                commands: [
                    DataTransferObjectMakeCommand::class,
                    ActionClassMakeCommand::class,
                    ServiceClassMakeCommand::class,
                ]
            );
        }
    }
}
