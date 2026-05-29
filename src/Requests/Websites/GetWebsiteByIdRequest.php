<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Websites;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single Website by ID
 *
 * GET /websites/{websiteId}
 */
class GetWebsiteByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $websiteId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/websites/'.$this->websiteId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
