<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\CustomEvents;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Trigger a custom event
 *
 * POST /custom-events/trigger
 */
class TriggerCustomEventRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $name,
        protected readonly string $contactId,
        protected readonly ?array $attributes = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/custom-events/trigger';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'contactId' => $this->contactId,
            'attributes' => $this->attributes,
        ], static fn ($value): bool => $value !== null);
    }
}
