<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Carts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Update cart
 *
 * POST /shops/{shopId}/carts/{cartId}
 */
class UpdateCartRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $cartId,
        protected readonly ?string $href = null,
        protected readonly ?string $contactId = null,
        protected readonly ?float $totalPrice = null,
        protected readonly ?float $totalTaxPrice = null,
        protected readonly ?string $currency = null,
        protected readonly ?array $selectedVariants = null,
        protected readonly ?string $externalId = null,
        protected readonly ?string $cartUrl = null,
        protected readonly ?string $createdOn = null,
        protected readonly ?string $updatedOn = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/carts/'.$this->cartId;
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'href' => $this->href,
            'contactId' => $this->contactId,
            'totalPrice' => $this->totalPrice,
            'totalTaxPrice' => $this->totalTaxPrice,
            'currency' => $this->currency,
            'selectedVariants' => $this->selectedVariants,
            'externalId' => $this->externalId,
            'cartUrl' => $this->cartUrl,
            'createdOn' => $this->createdOn,
            'updatedOn' => $this->updatedOn,
        ], static fn ($value): bool => $value !== null);
    }
}
