<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Products;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update product
 *
 * POST /shops/{shopId}/products/{productId}
 */
class UpdateProductRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $productId,
        protected readonly ?string $href = null,
        protected readonly ?string $name = null,
        protected readonly ?string $type = null,
        protected readonly ?string $url = null,
        protected readonly ?string $vendor = null,
        protected readonly ?string $externalId = null,
        protected readonly ?array $categories = null,
        protected readonly ?array $variants = null,
        protected readonly ?array $metaFields = null,
        protected readonly ?string $createdOn = null,
        protected readonly ?string $updatedOn = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/products/'.$this->productId;
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'href' => $this->href,
            'name' => $this->name,
            'type' => $this->type,
            'url' => $this->url,
            'vendor' => $this->vendor,
            'externalId' => $this->externalId,
            'categories' => $this->categories,
            'variants' => $this->variants,
            'metaFields' => $this->metaFields,
            'createdOn' => $this->createdOn,
            'updatedOn' => $this->updatedOn,
        ], static fn ($value): bool => $value !== null);
    }
}
