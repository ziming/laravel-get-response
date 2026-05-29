<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Products;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create product
 *
 * POST /shops/{shopId}/products
 */
class CreateProductRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $name,
        protected readonly array $variants,
        protected readonly ?string $productId = null,
        protected readonly ?string $href = null,
        protected readonly ?string $type = null,
        protected readonly ?string $url = null,
        protected readonly ?string $vendor = null,
        protected readonly ?string $externalId = null,
        protected readonly ?array $categories = null,
        protected readonly ?array $metaFields = null,
        protected readonly ?string $createdOn = null,
        protected readonly ?string $updatedOn = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/products';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'variants' => $this->variants,
            'productId' => $this->productId,
            'href' => $this->href,
            'type' => $this->type,
            'url' => $this->url,
            'vendor' => $this->vendor,
            'externalId' => $this->externalId,
            'categories' => $this->categories,
            'metaFields' => $this->metaFields,
            'createdOn' => $this->createdOn,
            'updatedOn' => $this->updatedOn,
        ], static fn ($value): bool => $value !== null);
    }
}
