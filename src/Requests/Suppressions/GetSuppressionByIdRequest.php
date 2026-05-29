<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Suppressions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a suppression list by ID
 *
 * GET /suppressions/{suppressionId}
 */
class GetSuppressionByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $suppressionId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/suppressions/'.$this->suppressionId;
    }
}
