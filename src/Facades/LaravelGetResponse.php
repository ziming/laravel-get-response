<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Ziming\LaravelGetResponse\LaravelGetResponse
 */
class LaravelGetResponse extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Ziming\LaravelGetResponse\LaravelGetResponse::class;
    }
}
