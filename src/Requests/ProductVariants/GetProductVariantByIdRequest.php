<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\ProductVariants;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Get a single product variant by ID
 *
 * GET /shops/{shopId}/products/{productId}/variants/{variantId}
 */
class GetProductVariantByIdRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $productId,
        protected readonly string $variantId,
        protected readonly array $fields = [],
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/products/'.$this->productId.'/variants/'.$this->variantId;
    }

    protected function defaultQuery(): array
    {
        return array_filter([
            'fields' => implode(',', $this->fields),
        ]);
    }
}
