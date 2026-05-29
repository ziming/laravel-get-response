<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\FileLibrary;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get storage space information
 *
 * GET /file-library/quota
 */
class QuotaRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct() {}

    public function resolveEndpoint(): string
    {
        return '/file-library/quota';
    }
}
