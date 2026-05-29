<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\ProductVariants;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create product variant
 *
 * POST /shops/{shopId}/products/{productId}/variants
 */
class CreateProductVariantRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $productId,
        protected readonly string $name,
        protected readonly string $sku,
        protected readonly float $price,
        protected readonly float $priceTax,
        protected readonly ?string $variantId = null,
        protected readonly ?string $href = null,
        protected readonly ?string $url = null,
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
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/products/'.$this->productId.'/variants';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'sku' => $this->sku,
            'price' => $this->price,
            'priceTax' => $this->priceTax,
            'variantId' => $this->variantId,
            'href' => $this->href,
            'url' => $this->url,
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
        ], static fn ($value): bool => $value !== null);
    }
}
