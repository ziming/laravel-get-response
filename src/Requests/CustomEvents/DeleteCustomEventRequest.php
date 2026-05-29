<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\CustomEvents;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete a custom event by custom event ID
 *
 * DELETE /custom-events/{customEventId}
 */
class DeleteCustomEventRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $customEventId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/custom-events/'.$this->customEventId;
    }
}
