<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Tracking;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get the list of "Facebook Pixels"
 *
 * GET /tracking/facebook-pixels
 */
class GetFacebookPixelListRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct() {}

    public function resolveEndpoint(): string
    {
        return '/tracking/facebook-pixels';
    }
}
