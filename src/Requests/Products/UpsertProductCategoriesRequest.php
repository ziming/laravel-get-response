<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Products;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Upsert product categories
 *
 * POST /shops/{shopId}/products/{productId}/categories
 */
class UpsertProductCategoriesRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $productId,
        protected readonly array $categories,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/products/'.$this->productId.'/categories';
    }

    protected function defaultBody(): array
    {
        return [
            'categories' => $this->categories,
        ];
    }
}
