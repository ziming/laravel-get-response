<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Automation\CustomEvents;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

class CreateCustomEventRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(
        protected readonly string $name,
        protected readonly array $attributes = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/custom-events';
    }

    protected function defaultBody(): array
    {
        return [
            'name' => $this->name,
            'attributes' => $this->attributes,
        ];
    }
}
