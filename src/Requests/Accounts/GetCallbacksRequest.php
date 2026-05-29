<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Accounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get callbacks configuration
 *
 * GET /accounts/callbacks
 */
class GetCallbacksRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct() {}

    public function resolveEndpoint(): string
    {
        return '/accounts/callbacks';
    }
}
