<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Products;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Upsert product meta fields
 *
 * POST /shops/{shopId}/products/{productId}/meta-fields
 */
class UpsertMetaFieldsRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $productId,
        protected readonly array $metaFields,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/products/'.$this->productId.'/meta-fields';
    }

    protected function defaultBody(): array
    {
        return [
            'metaFields' => $this->metaFields,
        ];
    }
}
