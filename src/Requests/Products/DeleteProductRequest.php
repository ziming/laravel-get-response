<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Products;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * Delete product
 *
 * DELETE /shops/{shopId}/products/{productId}
 */
class DeleteProductRequest extends Request
{
    protected Method $method = Method::DELETE;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $productId,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/products/'.$this->productId;
    }
}
