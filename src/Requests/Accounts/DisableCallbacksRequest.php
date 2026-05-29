<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Accounts;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Disable callbacks
 *
 * DELETE /accounts/callbacks
 */
class DisableCallbacksRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct() {}

    public function resolveEndpoint(): string
    {
        return '/accounts/callbacks';
    }
}
