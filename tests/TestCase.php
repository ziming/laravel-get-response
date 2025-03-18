<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Orchestra\Testbench\TestCase as Orchestra;
use Ziming\LaravelGetResponse\LaravelGetResponseServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app): array
    {
        return [
            LaravelGetResponseServiceProvider::class,
        ];
    }
}
