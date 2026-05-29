<?php

declare(strict_types=1);

namespace Ziming\LaravelGetResponse\Requests\Carts;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Create cart
 *
 * POST /shops/{shopId}/carts
 */
class CreateCartRequest extends Request implements HasBody
{
    protected Method $method = Method::POST;

    use HasJsonBody;

    public function __construct(
        protected readonly string $shopId,
        protected readonly string $contactId,
        protected readonly float $totalPrice,
        protected readonly string $currency,
        protected readonly array $selectedVariants,
        protected readonly ?string $cartId = null,
        protected readonly ?string $href = null,
        protected readonly ?float $totalTaxPrice = null,
        protected readonly ?string $externalId = null,
        protected readonly ?string $cartUrl = null,
        protected readonly ?string $createdOn = null,
        protected readonly ?string $updatedOn = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/shops/'.$this->shopId.'/carts';
    }

    protected function defaultBody(): array
    {
        return array_filter([
            'contactId' => $this->contactId,
            'totalPrice' => $this->totalPrice,
            'currency' => $this->currency,
            'selectedVariants' => $this->selectedVariants,
            'cartId' => $this->cartId,
            'href' => $this->href,
            'totalTaxPrice' => $this->totalTaxPrice,
            'externalId' => $this->externalId,
            'cartUrl' => $this->cartUrl,
            'createdOn' => $this->createdOn,
            'updatedOn' => $this->updatedOn,
        ], static fn ($value): bool => $value !== null);
    }
}
