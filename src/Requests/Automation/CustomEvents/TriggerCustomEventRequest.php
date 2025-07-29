<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Automation\CustomEvents;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Contracts\Body\HasBody;
use Saloon\Traits\Body\HasJsonBody;

class TriggerCustomEventRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected readonly string $name,
        protected readonly string $contactId,
        protected readonly array $attributes = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/custom-events/trigger';
    }

    protected function defaultBody(): array
    {
        return [
            'name' => $this->name,
            'contactId' => $this->contactId,
            'attributes' => $this->attributes,
        ];
    }
}
