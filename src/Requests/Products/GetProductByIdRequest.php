<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Products;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single product by ID
 *
 * GET /shops/{shopId}/products/{productId}
 */
class GetProductByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $productId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/products/'.$this->productId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
