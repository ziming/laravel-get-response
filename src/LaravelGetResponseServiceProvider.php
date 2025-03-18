<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Ziming\LaravelGetResponse\Commands\LaravelGetResponseCommand;

class LaravelGetResponseServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-get-response')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel_get_response_table')
            ->hasCommand(LaravelGetResponseCommand::class);
    }
}
