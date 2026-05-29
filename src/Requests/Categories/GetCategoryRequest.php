<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Categories;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single category by ID
 *
 * GET /shops/{shopId}/categories/{categoryId}
 */
class GetCategoryRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $categoryId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/categories/'.$this->categoryId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
