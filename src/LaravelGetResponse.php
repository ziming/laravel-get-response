<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse;

use Saloon\Contracts\Authenticator;
use Saloon\Http\Auth\HeaderAuthenticator;
use Saloon\Http\Connector;

/*
 * Add Oauth authenticator in the future
 */
class LaravelGetResponse extends Connector
{
    public function __construct(protected readonly string $token) {}

    protected function defaultAuth(): HeaderAuthenticator
    {
        return new HeaderAuthenticator($this->token, 'X-AUTH-TOKEN');
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.getresponse.com/v3/';
    }
}
