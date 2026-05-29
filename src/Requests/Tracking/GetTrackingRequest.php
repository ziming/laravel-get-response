<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Tracking;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get Tracking JavaScript code snippets
 *
 * GET /tracking
 */
class GetTrackingRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct() {}

    public function resolveEndpoint(): string
    {
        return '/tracking';
    }
}
