<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Shops;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update shop
 *
 * POST /shops/{shopId}
 */
class UpdateShopRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $shopId,
        protected readonly ?string $href = null,
        protected readonly ?string $name = null,
        protected readonly ?string $locale = null,
        protected readonly ?string $currency = null,
        protected readonly ?string $createdOn = null,
        protected readonly ?string $updatedOn = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId;
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'href' => $this->href,
            'name' => $this->name,
            'locale' => $this->locale,
            'currency' => $this->currency,
            'createdOn' => $this->createdOn,
            'updatedOn' => $this->updatedOn,
        ], static fn ($value): bool => $value !== null);
    }
}
