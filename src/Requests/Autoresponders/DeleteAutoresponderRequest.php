<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Autoresponders;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete autoresponder.
 *
 * DELETE /autoresponders/{autoresponderId}
 */
class DeleteAutoresponderRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $autoresponderId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/autoresponders/'.$this->autoresponderId;
    }
}
