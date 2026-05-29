<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\ProductVariants;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update product variant
 *
 * POST /shops/{shopId}/products/{productId}/variants/{variantId}
 */
class UpdateProductVariantRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $productId,
        protected readonly string $variantId,
        protected readonly ?string $href = null,
        protected readonly ?string $name = null,
        protected readonly ?string $url = null,
        protected readonly ?string $sku = null,
        protected readonly ?float $price = null,
        protected readonly ?float $priceTax = null,
        protected readonly ?float $previousPrice = null,
        protected readonly ?float $previousPriceTax = null,
        protected readonly ?int $quantity = null,
        protected readonly ?int $position = null,
        protected readonly ?string $barcode = null,
        protected readonly ?string $externalId = null,
        protected readonly ?string $description = null,
        protected readonly ?array $images = null,
        protected readonly ?array $metaFields = null,
        protected readonly ?array $taxes = null,
        protected readonly ?string $createdOn = null,
        protected readonly ?string $updatedOn = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/products/'.$this->productId.'/variants/'.$this->variantId;
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'href' => $this->href,
            'name' => $this->name,
            'url' => $this->url,
            'sku' => $this->sku,
            'price' => $this->price,
            'priceTax' => $this->priceTax,
            'previousPrice' => $this->previousPrice,
            'previousPriceTax' => $this->previousPriceTax,
            'quantity' => $this->quantity,
            'position' => $this->position,
            'barcode' => $this->barcode,
            'externalId' => $this->externalId,
            'description' => $this->description,
            'images' => $this->images,
            'metaFields' => $this->metaFields,
            'taxes' => $this->taxes,
            'createdOn' => $this->createdOn,
            'updatedOn' => $this->updatedOn,
        ], static fn ($value): bool => $value !== null);
    }
}
