<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse;

use Illuminate\Support\Facades\Cache;
use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\HeaderAuthenticator;
use Saloon\Http\Connector;
use Saloon\RateLimitPlugin\Contracts\RateLimitStore;
use Saloon\RateLimitPlugin\Limit;
use Saloon\RateLimitPlugin\Stores\LaravelCacheStore;
use Saloon\RateLimitPlugin\Traits\HasRateLimits;
use Ziming\LaravelGetResponse\Resources\User\AccountResource;

/*
 * Add Oauth authenticator in the future
 */
class LaravelGetResponse extends Connector
{
    use HasRateLimits;

    public function __construct(protected readonly string $token) {}

    protected function defaultAuth(): HeaderAuthenticator
    {
        return new HeaderAuthenticator($this->token, 'X-AUTH-TOKEN');
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.getresponse.com/v3/';
    }

    protected function resolveLimits(): array
    {
        return [
            Limit::allow(80)
                ->everySeconds(1),

            // 600 seconds is 10 minutes
            Limit::allow(30_000)
                ->everySeconds(600),
        ];
    }

    protected function resolveRateLimitStore(): RateLimitStore
    {
        return new LaravelCacheStore(
            Cache::store(config('cache.default'))
        );
    }

    public function account(): AccountResource
    {
        return new AccountResource($this);
    }
}
