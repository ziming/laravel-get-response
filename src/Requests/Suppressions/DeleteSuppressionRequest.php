<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Suppressions;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Deletes a given suppression list by ID
 *
 * DELETE /suppressions/{suppressionId}
 */
class DeleteSuppressionRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $suppressionId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/suppressions/'.$this->suppressionId;
    }
}
