<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\CustomEvents;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update custom event details
 *
 * POST /custom-events/{customEventId}
 */
class UpdateCustomEventRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $customEventId,
        protected readonly string $name,
        protected readonly array $attributes,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/custom-events/'.$this->customEventId;
    }

    protected function defaultBody(): array
    {
        return [
            'name' => $this->name,
            'attributes' => $this->attributes,
        ];
    }
}
