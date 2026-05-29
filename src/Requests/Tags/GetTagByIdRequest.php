<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Tags;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get tag by ID
 *
 * GET /tags/{tagId}
 */
class GetTagByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $tagId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/tags/'.$this->tagId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
