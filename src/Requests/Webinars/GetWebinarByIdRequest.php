<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Webinars;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a webinar by ID
 *
 * GET /webinars/{webinarId}
 */
class GetWebinarByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $webinarId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/webinars/'.$this->webinarId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
