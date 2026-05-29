<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\ProductVariants;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete product variant
 *
 * DELETE /shops/{shopId}/products/{productId}/variants/{variantId}
 */
class DeleteProductVariantRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $productId,
        protected readonly string $variantId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/products/'.$this->productId.'/variants/'.$this->variantId;
    }
}
