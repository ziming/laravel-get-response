<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Automation\CustomEvents;

use Saloon\Enums\Method;
use Saloon\Http\Request;

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
