<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\CustomEvents;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get custom events by custom event ID
 *
 * GET /custom-events/{customEventId}
 */
class GetCustomEventByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $customEventId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/custom-events/'.$this->customEventId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
