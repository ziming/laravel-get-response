<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Shops;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create shop
 *
 * POST /shops
 */
class CreateShopRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $name,
        protected readonly string $locale,
        protected readonly string $currency,
        protected readonly ?string $shopId = null,
        protected readonly ?string $href = null,
        protected readonly ?string $createdOn = null,
        protected readonly ?string $updatedOn = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'name' => $this->name,
            'locale' => $this->locale,
            'currency' => $this->currency,
            'shopId' => $this->shopId,
            'href' => $this->href,
            'createdOn' => $this->createdOn,
            'updatedOn' => $this->updatedOn,
        ], static fn ($value): bool => $value !== null);
    }
}
